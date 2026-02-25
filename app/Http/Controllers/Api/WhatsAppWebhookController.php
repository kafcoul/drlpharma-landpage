<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Handle Infobip WhatsApp delivery reports & incoming messages.
 *
 * Configure this webhook URL in your Infobip portal:
 * POST /api/webhooks/whatsapp
 */
class WhatsAppWebhookController extends Controller
{
    /**
     * Handle delivery report from Infobip.
     *
     * Infobip sends delivery reports to your notifyUrl or configured webhook.
     * Statuses: PENDING, DELIVERED, SEEN, FAILED, REJECTED, EXPIRED
     */
    public function deliveryReport(Request $request)
    {
        $results = $request->input('results', []);

        foreach ($results as $result) {
            $messageId = $result['messageId'] ?? null;
            $status = $result['status']['groupName'] ?? 'UNKNOWN';
            $to = $result['to'] ?? null;
            $sentAt = $result['sentAt'] ?? null;
            $doneAt = $result['doneAt'] ?? null;

            Log::info('WhatsApp delivery report', [
                'messageId' => $messageId,
                'to' => $to,
                'status' => $status,
                'sentAt' => $sentAt,
                'doneAt' => $doneAt,
                'error' => $result['error'] ?? null,
            ]);

            // Handle specific statuses
            match ($status) {
                'DELIVERED' => $this->handleDelivered($messageId, $to),
                'SEEN' => $this->handleSeen($messageId, $to),
                'FAILED', 'REJECTED', 'EXPIRED' => $this->handleFailed($messageId, $to, $status, $result),
                default => null,
            };
        }

        return response()->json(['status' => 'ok']);
    }

    /**
     * Handle incoming WhatsApp messages from users.
     *
     * This webhook receives messages when a customer sends a WhatsApp
     * message to your business number (opens the 24h messaging window).
     */
    public function incomingMessage(Request $request)
    {
        $results = $request->input('results', []);

        foreach ($results as $message) {
            $from = $message['from'] ?? null;
            $to = $message['to'] ?? null;
            $receivedAt = $message['receivedAt'] ?? null;
            $messageId = $message['messageId'] ?? null;
            $messageType = $message['message']['type'] ?? 'UNKNOWN';
            $text = $message['message']['text'] ?? null;

            Log::info('WhatsApp incoming message', [
                'from' => $from,
                'to' => $to,
                'messageId' => $messageId,
                'type' => $messageType,
                'text' => $text,
                'receivedAt' => $receivedAt,
            ]);

            // TODO: Implement auto-reply or route to support
            // For now, just log incoming messages
            // Future: Create support tickets, auto-reply with order status, etc.
        }

        return response()->json(['status' => 'ok']);
    }

    /**
     * Handle delivered status
     */
    protected function handleDelivered(string $messageId, string $to): void
    {
        Log::info("WhatsApp message delivered", [
            'messageId' => $messageId,
            'to' => $to,
        ]);
    }

    /**
     * Handle seen status
     */
    protected function handleSeen(string $messageId, string $to): void
    {
        Log::info("WhatsApp message seen", [
            'messageId' => $messageId,
            'to' => $to,
        ]);
    }

    /**
     * Handle failed/rejected/expired status
     */
    protected function handleFailed(string $messageId, string $to, string $status, array $result): void
    {
        Log::warning("WhatsApp message {$status}", [
            'messageId' => $messageId,
            'to' => $to,
            'status' => $status,
            'error' => $result['error'] ?? null,
        ]);
    }
}
