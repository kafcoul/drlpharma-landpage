<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Infobip\Model\SmsDeliveryReport;
use Infobip\Model\SmsDeliveryResult;
use Infobip\Model\SmsMessageError;
use Infobip\Model\SmsMessageStatus;
use Infobip\Model\SmsWebhookInboundReport;
use Infobip\Model\SmsWebhookInboundReportResponse;
use Infobip\ObjectSerializer;

/**
 * Handle Infobip SMS delivery reports & incoming messages.
 *
 * Uses the official Infobip PHP SDK models for type-safe deserialization.
 *
 * Delivery Reports (push):
 *   POST /api/webhooks/sms/delivery
 *   Configuré via notifyUrl dans les requêtes SMS ou dans le portail Infobip
 *
 * Incoming SMS (push):
 *   POST /api/webhooks/sms/incoming
 *   Configuré dans: Portail Infobip > Numbers > Forwarding
 *
 * @see https://www.infobip.com/docs/api/channels/sms/sms-messaging/outbound-sms
 */
class SmsWebhookController extends Controller
{
    protected ObjectSerializer $serializer;

    public function __construct()
    {
        $this->serializer = new ObjectSerializer();
    }

    /**
     * Handle SMS delivery report from Infobip.
     *
     * Infobip sends delivery reports to the notifyUrl specified in the send request.
     *
     * Statuses:
     * - PENDING: Message accepted, pending delivery
     * - UNDELIVERABLE: Message cannot be delivered
     * - DELIVERED: Message successfully delivered
     * - EXPIRED: Message validity period expired
     * - REJECTED: Message rejected by operator/system
     *
     * @see https://www.infobip.com/docs/essentials/api-essentials/response-status-and-error-codes
     */
    public function deliveryReport(Request $request)
    {
        $rawResults = $request->input('results', []);

        foreach ($rawResults as $rawResult) {
            // Deserialize into typed SDK model
            /** @var SmsDeliveryReport $report */
            $report = $this->deserializeResult($rawResult, SmsDeliveryReport::class);

            if (!$report) {
                // Fallback: handle raw data if deserialization fails
                $this->handleRawDeliveryReport($rawResult);
                continue;
            }

            $messageId = $report->getMessageId();
            $bulkId = $report->getBulkId();
            $to = $report->getTo();
            $sentAt = $report->getSentAt()?->format('c');
            $doneAt = $report->getDoneAt()?->format('c');
            $messageCount = $report->getMessageCount() ?? 1;
            $callbackData = $report->getCallbackData();

            // Status info (typed)
            $status = $report->getStatus();
            $statusGroup = $status?->getGroupName() ?? 'UNKNOWN';
            $statusName = $status?->getName() ?? 'UNKNOWN';
            $statusDescription = $status?->getDescription() ?? '';
            $statusId = $status?->getId();

            // Price info (typed)
            $price = $report->getPrice();
            $priceData = $price ? [
                'amount' => $price->getPricePerMessage(),
                'currency' => $price->getCurrency(),
            ] : null;

            // Error info (typed)
            $error = $report->getError();
            $errorData = $error ? [
                'groupId' => $error->getGroupId(),
                'groupName' => $error->getGroupName(),
                'id' => $error->getId(),
                'name' => $error->getName(),
                'description' => $error->getDescription(),
            ] : null;

            Log::info('SMS delivery report', [
                'messageId' => $messageId,
                'bulkId' => $bulkId,
                'to' => $to,
                'status' => $statusGroup,
                'statusName' => $statusName,
                'statusDescription' => $statusDescription,
                'sentAt' => $sentAt,
                'doneAt' => $doneAt,
                'smsCount' => $messageCount,
                'price' => $priceData,
                'error' => $errorData,
                'callbackData' => $callbackData,
            ]);

            // Mettre à jour le cache si le messageId existe
            if ($messageId) {
                $cached = Cache::get("sms_msg_{$messageId}");
                if ($cached) {
                    $cached['status'] = $statusGroup;
                    $cached['status_name'] = $statusName;
                    $cached['done_at'] = $doneAt;
                    $cached['price'] = $priceData;
                    $cached['sms_count'] = $messageCount;
                    Cache::put("sms_msg_{$messageId}", $cached, now()->addHours(48));
                }
            }

            // Handle specific statuses
            match ($statusGroup) {
                'DELIVERED' => $this->handleDelivered($messageId, $to, $report),
                'UNDELIVERABLE' => $this->handleUndeliverable($messageId, $to, $report),
                'EXPIRED' => $this->handleExpired($messageId, $to, $report),
                'REJECTED' => $this->handleRejected($messageId, $to, $report),
                default => null,
            };
        }

        return response()->json(['status' => 'ok']);
    }

    /**
     * Handle incoming SMS messages from users.
     *
     * Infobip pushes received SMS to this endpoint.
     * Configure forwarding in: Portail Infobip > Numbers > Your Number > Forwarding
     */
    public function incomingMessage(Request $request)
    {
        $rawResults = $request->input('results', []);

        foreach ($rawResults as $rawMessage) {
            // Deserialize into typed SDK model
            /** @var SmsWebhookInboundReport $message */
            $message = $this->deserializeResult($rawMessage, SmsWebhookInboundReport::class);

            if (!$message) {
                // Fallback: handle raw data
                Log::info('SMS incoming message (raw)', $rawMessage);
                continue;
            }

            $from = $message->getFrom();
            $to = $message->getTo();
            $receivedAt = $message->getReceivedAt()?->format('c');
            $messageId = $message->getMessageId();
            $text = $message->getText() ?? $message->getCleanText();
            $keyword = $message->getKeyword();
            $smsCount = $message->getSmsCount() ?? 1;

            Log::info('SMS incoming message', [
                'from' => $from,
                'to' => $to,
                'messageId' => $messageId,
                'text' => $text,
                'keyword' => $keyword,
                'smsCount' => $smsCount,
                'receivedAt' => $receivedAt,
            ]);

            // Traiter les commandes par mot-clé
            if ($keyword) {
                $this->handleKeyword($from, $keyword, $text);
            }
        }

        return response()->json(['status' => 'ok']);
    }

    // ──────────────────────────────────────────────────────────────────────
    // STATUS HANDLERS
    // ──────────────────────────────────────────────────────────────────────

    /**
     * Handle delivered status - SMS livré avec succès
     */
    protected function handleDelivered(?string $messageId, ?string $to, SmsDeliveryReport $report): void
    {
        $price = $report->getPrice();

        Log::info("SMS delivered", [
            'messageId' => $messageId,
            'to' => $to,
            'doneAt' => $report->getDoneAt()?->format('c'),
            'price' => $price ? $price->getPricePerMessage() : null,
            'currency' => $price ? $price->getCurrency() : null,
        ]);

        // TODO: Mettre à jour les statistiques d'envoi
        // TODO: Confirmer la conversion si tracking activé
    }

    /**
     * Handle undeliverable status - SMS non livrable
     */
    protected function handleUndeliverable(?string $messageId, ?string $to, SmsDeliveryReport $report): void
    {
        $error = $report->getError();
        $status = $report->getStatus();

        Log::warning("SMS undeliverable", [
            'messageId' => $messageId,
            'to' => $to,
            'errorName' => $error?->getName(),
            'errorDescription' => $error?->getDescription(),
            'statusName' => $status?->getName(),
        ]);

        // TODO: Marquer le numéro comme problématique
        // TODO: Notifier l'admin si le taux d'échec est trop élevé
    }

    /**
     * Handle expired status - SMS expiré (non livré dans le délai)
     */
    protected function handleExpired(?string $messageId, ?string $to, SmsDeliveryReport $report): void
    {
        Log::warning("SMS expired", [
            'messageId' => $messageId,
            'to' => $to,
            'sentAt' => $report->getSentAt()?->format('c'),
            'doneAt' => $report->getDoneAt()?->format('c'),
        ]);
    }

    /**
     * Handle rejected status - SMS rejeté
     */
    protected function handleRejected(?string $messageId, ?string $to, SmsDeliveryReport $report): void
    {
        $error = $report->getError();
        $status = $report->getStatus();

        Log::error("SMS rejected", [
            'messageId' => $messageId,
            'to' => $to,
            'errorName' => $error?->getName(),
            'errorDescription' => $error?->getDescription(),
            'statusName' => $status?->getName(),
        ]);

        // TODO: Alerter si rejet récurrent (mauvais sender, numéro blacklisté, etc.)
    }

    // ──────────────────────────────────────────────────────────────────────
    // KEYWORD HANDLERS
    // ──────────────────────────────────────────────────────────────────────

    /**
     * Handle keyword-based auto-replies
     *
     * Mots-clés supportés:
     * - STOP: Opt-out des communications
     * - AIDE/HELP: Envoyer un message d'aide
     * - COMMANDE/ORDER: Info sur la dernière commande
     */
    protected function handleKeyword(string $from, string $keyword, ?string $text): void
    {
        $keyword = strtoupper(trim($keyword));

        match ($keyword) {
            'STOP', 'ARRET', 'DESABONNER' => $this->handleOptOut($from),
            'AIDE', 'HELP' => $this->handleHelp($from),
            default => Log::info("SMS keyword not handled", ['from' => $from, 'keyword' => $keyword]),
        };
    }

    /**
     * Handle opt-out request
     */
    protected function handleOptOut(string $phone): void
    {
        Log::info("SMS opt-out request", ['phone' => $phone]);

        // TODO: Marquer le numéro comme opt-out dans la base
        // TODO: Envoyer une confirmation de désinscription
    }

    /**
     * Handle help request
     */
    protected function handleHelp(string $phone): void
    {
        Log::info("SMS help request", ['phone' => $phone]);

        // TODO: Envoyer un SMS d'aide avec les contacts support
        // app(SmsService::class)->send($phone, 'DR-PHARMA: Contactez-nous au +225 XX XX XX XX ou via WhatsApp.');
    }

    // ──────────────────────────────────────────────────────────────────────
    // DESERIALIZATION HELPERS
    // ──────────────────────────────────────────────────────────────────────

    /**
     * Safely deserialize a raw webhook result into an SDK model.
     * Returns null on failure (caller should handle fallback).
     */
    protected function deserializeResult(array $data, string $class): mixed
    {
        try {
            return $this->serializer->deserialize(
                data: json_encode($data),
                class: $class,
            );
        } catch (\Exception $e) {
            Log::warning('SMS webhook deserialization failed', [
                'class' => $class,
                'error' => $e->getMessage(),
            ]);
            return null;
        }
    }

    /**
     * Fallback handler for raw delivery report data when SDK deserialization fails.
     */
    protected function handleRawDeliveryReport(array $result): void
    {
        $messageId = $result['messageId'] ?? null;
        $to = $result['to'] ?? null;
        $statusGroup = $result['status']['groupName'] ?? 'UNKNOWN';

        Log::info('SMS delivery report (raw fallback)', [
            'messageId' => $messageId,
            'to' => $to,
            'status' => $statusGroup,
        ]);

        if ($messageId) {
            $cached = Cache::get("sms_msg_{$messageId}");
            if ($cached) {
                $cached['status'] = $statusGroup;
                Cache::put("sms_msg_{$messageId}", $cached, now()->addHours(48));
            }
        }
    }
}
