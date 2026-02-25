<?php

namespace Tests\Unit\Channels;

use App\Channels\WhatsAppChannel;
use App\Services\WhatsAppService;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class WhatsAppChannelTest extends TestCase
{
    use RefreshDatabase;

    protected WhatsAppChannel $channel;
    protected WhatsAppService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new WhatsAppService();
        $this->channel = new WhatsAppChannel($this->service);
    }

    /** @test */
    public function it_does_not_send_if_notification_has_no_toWhatsApp_method()
    {
        $user = User::factory()->create(['phone' => '+2250700000000']);
        $notification = new WhatsAppNotificationWithoutMethod();

        Http::fake();

        $this->channel->send($user, $notification);

        Http::assertNothingSent();
    }

    /** @test */
    public function it_does_not_send_if_toWhatsApp_returns_null()
    {
        $user = User::factory()->create(['phone' => '+2250700000000']);
        $notification = new WhatsAppNotificationReturnsNull();

        Http::fake();

        $this->channel->send($user, $notification);

        Http::assertNothingSent();
    }

    /** @test */
    public function it_does_not_send_if_user_has_no_phone()
    {
        Log::shouldReceive('warning')
            ->once()
            ->with('No phone number found for WhatsApp notification', \Mockery::any());

        $user = User::factory()->create(['phone' => null]);
        $notification = new WhatsAppTextNotification();

        Http::fake();

        $this->channel->send($user, $notification);

        Http::assertNothingSent();
    }

    /** @test */
    public function it_logs_text_message_when_not_configured()
    {
        config(['whatsapp.enabled' => false]);

        Log::shouldReceive('info')
            ->atLeast()->once();

        $user = User::factory()->create(['phone' => '+2250700000000']);
        $notification = new WhatsAppTextNotification();

        $this->channel->send($user, $notification);
    }

    /** @test */
    public function it_sends_text_message_via_infobip()
    {
        config([
            'whatsapp.enabled' => true,
            'whatsapp.base_url' => 'https://test.api.infobip.com',
            'whatsapp.api_key' => 'test_api_key',
            'whatsapp.sender_number' => '2250100000000',
        ]);

        // Recréer le service avec les nouvelles configs
        $service = new WhatsAppService();
        $channel = new WhatsAppChannel($service);

        Http::fake([
            'test.api.infobip.com/whatsapp/1/message/text' => Http::response([
                'to' => '2250700000000',
                'messageCount' => 1,
                'messageId' => 'test-msg-id',
                'status' => [
                    'groupId' => 1,
                    'groupName' => 'PENDING',
                    'id' => 7,
                    'name' => 'PENDING_ENROUTE',
                    'description' => 'Message sent to next instance',
                ],
            ], 200),
        ]);

        Log::shouldReceive('info')
            ->atLeast()->once();

        $user = User::factory()->create(['phone' => '+2250700000000']);
        $notification = new WhatsAppTextNotification();

        $channel->send($user, $notification);

        Http::assertSent(function ($request) {
            return str_contains($request->url(), '/whatsapp/1/message/text')
                && $request->hasHeader('Authorization', 'App test_api_key')
                && $request['content']['text'] === 'Hello from DR-PHARMA!';
        });
    }

    /** @test */
    public function it_sends_template_message_via_infobip()
    {
        config([
            'whatsapp.enabled' => true,
            'whatsapp.base_url' => 'https://test.api.infobip.com',
            'whatsapp.api_key' => 'test_api_key',
            'whatsapp.sender_number' => '2250100000000',
        ]);

        $service = new WhatsAppService();
        $channel = new WhatsAppChannel($service);

        Http::fake([
            'test.api.infobip.com/whatsapp/1/message/template' => Http::response([
                'messages' => [
                    [
                        'to' => '2250700000000',
                        'messageCount' => 1,
                        'messageId' => 'template-msg-id',
                        'status' => [
                            'groupId' => 1,
                            'groupName' => 'PENDING',
                        ],
                    ],
                ],
                'bulkId' => 'bulk-123',
            ], 200),
        ]);

        Log::shouldReceive('info')
            ->atLeast()->once();

        $user = User::factory()->create(['phone' => '+2250700000000']);
        $notification = new WhatsAppTemplateNotification();

        $channel->send($user, $notification);

        Http::assertSent(function ($request) {
            return str_contains($request->url(), '/whatsapp/1/message/template')
                && $request['messages'][0]['content']['templateName'] === 'order_confirmed'
                && $request['messages'][0]['content']['language'] === 'fr';
        });
    }

    /** @test */
    public function it_handles_api_error_gracefully()
    {
        config([
            'whatsapp.enabled' => true,
            'whatsapp.base_url' => 'https://test.api.infobip.com',
            'whatsapp.api_key' => 'test_api_key',
            'whatsapp.sender_number' => '2250100000000',
        ]);

        $service = new WhatsAppService();
        $channel = new WhatsAppChannel($service);

        Http::fake([
            'test.api.infobip.com/*' => Http::response([
                'requestError' => [
                    'serviceException' => [
                        'messageId' => 'UNAUTHORIZED',
                        'text' => 'Invalid API key',
                    ],
                ],
            ], 401),
        ]);

        Log::shouldReceive('error')
            ->atLeast()->once();

        $user = User::factory()->create(['phone' => '+2250700000000']);
        $notification = new WhatsAppTextNotification();

        // Should not throw exception
        $channel->send($user, $notification);
    }

    /** @test */
    public function it_sends_image_message()
    {
        config([
            'whatsapp.enabled' => true,
            'whatsapp.base_url' => 'https://test.api.infobip.com',
            'whatsapp.api_key' => 'test_api_key',
            'whatsapp.sender_number' => '2250100000000',
        ]);

        $service = new WhatsAppService();
        $channel = new WhatsAppChannel($service);

        Http::fake([
            'test.api.infobip.com/whatsapp/1/message/image' => Http::response([
                'to' => '2250700000000',
                'messageId' => 'img-msg-id',
                'status' => ['groupName' => 'PENDING'],
            ], 200),
        ]);

        Log::shouldReceive('info')
            ->atLeast()->once();

        $user = User::factory()->create(['phone' => '+2250700000000']);
        $notification = new WhatsAppImageNotification();

        $channel->send($user, $notification);

        Http::assertSent(function ($request) {
            return str_contains($request->url(), '/whatsapp/1/message/image')
                && $request['content']['mediaUrl'] === 'https://example.com/photo.jpg';
        });
    }

    /** @test */
    public function it_sends_document_message()
    {
        config([
            'whatsapp.enabled' => true,
            'whatsapp.base_url' => 'https://test.api.infobip.com',
            'whatsapp.api_key' => 'test_api_key',
            'whatsapp.sender_number' => '2250100000000',
        ]);

        $service = new WhatsAppService();
        $channel = new WhatsAppChannel($service);

        Http::fake([
            'test.api.infobip.com/whatsapp/1/message/document' => Http::response([
                'to' => '2250700000000',
                'messageId' => 'doc-msg-id',
                'status' => ['groupName' => 'PENDING'],
            ], 200),
        ]);

        Log::shouldReceive('info')
            ->atLeast()->once();

        $user = User::factory()->create(['phone' => '+2250700000000']);
        $notification = new WhatsAppDocumentNotification();

        $channel->send($user, $notification);

        Http::assertSent(function ($request) {
            return str_contains($request->url(), '/whatsapp/1/message/document')
                && $request['content']['filename'] === 'facture.pdf';
        });
    }
}

// ──────────────────────────────────────────────────────────────────────────────
// Test notification classes
// ──────────────────────────────────────────────────────────────────────────────

class WhatsAppNotificationWithoutMethod extends Notification
{
    public function via($notifiable)
    {
        return [\App\Channels\WhatsAppChannel::class];
    }
}

class WhatsAppNotificationReturnsNull extends Notification
{
    public function via($notifiable)
    {
        return [\App\Channels\WhatsAppChannel::class];
    }

    public function toWhatsApp($notifiable)
    {
        return null;
    }
}

class WhatsAppTextNotification extends Notification
{
    public function via($notifiable)
    {
        return [\App\Channels\WhatsAppChannel::class];
    }

    public function toWhatsApp($notifiable)
    {
        return [
            'type' => 'text',
            'text' => 'Hello from DR-PHARMA!',
        ];
    }
}

class WhatsAppTemplateNotification extends Notification
{
    public function via($notifiable)
    {
        return [\App\Channels\WhatsAppChannel::class];
    }

    public function toWhatsApp($notifiable)
    {
        return [
            'type' => 'template',
            'template_name' => 'order_confirmed',
            'language' => 'fr',
            'placeholders' => ['John', 'CMD-001', 'Pharmacie Test'],
        ];
    }
}

class WhatsAppImageNotification extends Notification
{
    public function via($notifiable)
    {
        return [\App\Channels\WhatsAppChannel::class];
    }

    public function toWhatsApp($notifiable)
    {
        return [
            'type' => 'image',
            'url' => 'https://example.com/photo.jpg',
            'caption' => 'Photo ordonnance',
        ];
    }
}

class WhatsAppDocumentNotification extends Notification
{
    public function via($notifiable)
    {
        return [\App\Channels\WhatsAppChannel::class];
    }

    public function toWhatsApp($notifiable)
    {
        return [
            'type' => 'document',
            'url' => 'https://example.com/invoice.pdf',
            'filename' => 'facture.pdf',
            'caption' => 'Votre facture',
        ];
    }
}
