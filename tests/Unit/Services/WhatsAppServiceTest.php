<?php

namespace Tests\Unit\Services;

use App\Services\WhatsAppService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class WhatsAppServiceTest extends TestCase
{
    protected function getConfiguredService(): WhatsAppService
    {
        config([
            'whatsapp.enabled' => true,
            'whatsapp.base_url' => 'https://test.api.infobip.com',
            'whatsapp.api_key' => 'test_api_key_123',
            'whatsapp.sender_number' => '2250100000000',
            'whatsapp.default_language' => 'fr',
            'whatsapp.default_country_code' => '+225',
        ]);

        return new WhatsAppService();
    }

    /** @test */
    public function it_reports_not_configured_when_disabled()
    {
        config(['whatsapp.enabled' => false]);
        $service = new WhatsAppService();

        $this->assertFalse($service->isConfigured());
    }

    /** @test */
    public function it_reports_not_configured_when_missing_credentials()
    {
        config([
            'whatsapp.enabled' => true,
            'whatsapp.base_url' => '',
            'whatsapp.api_key' => '',
        ]);
        $service = new WhatsAppService();

        $this->assertFalse($service->isConfigured());
    }

    /** @test */
    public function it_reports_configured_with_valid_credentials()
    {
        $service = $this->getConfiguredService();

        $this->assertTrue($service->isConfigured());
    }

    /** @test */
    public function it_normalizes_local_phone_numbers()
    {
        $service = $this->getConfiguredService();

        $this->assertEquals('+2250712345678', $service->normalizePhone('0712345678'));
    }

    /** @test */
    public function it_normalizes_phone_without_plus()
    {
        $service = $this->getConfiguredService();

        $this->assertEquals('+2250712345678', $service->normalizePhone('2250712345678'));
    }

    /** @test */
    public function it_keeps_international_format_phone()
    {
        $service = $this->getConfiguredService();

        $this->assertEquals('+2250712345678', $service->normalizePhone('+2250712345678'));
    }

    /** @test */
    public function it_removes_spaces_and_dashes_from_phone()
    {
        $service = $this->getConfiguredService();

        $this->assertEquals('+2250712345678', $service->normalizePhone('+225 07 12 34 56 78'));
    }

    /** @test */
    public function it_sends_text_message_successfully()
    {
        $service = $this->getConfiguredService();

        Http::fake([
            'test.api.infobip.com/whatsapp/1/message/text' => Http::response([
                'to' => '2250700000000',
                'messageCount' => 1,
                'messageId' => 'txt-123',
                'status' => [
                    'groupId' => 1,
                    'groupName' => 'PENDING',
                    'id' => 7,
                    'name' => 'PENDING_ENROUTE',
                ],
            ], 200),
        ]);

        $result = $service->sendText('+2250700000000', 'Bonjour!');

        $this->assertTrue($result);

        Http::assertSent(function ($request) {
            return $request['from'] === '2250100000000'
                && $request['to'] === '+2250700000000'
                && $request['content']['text'] === 'Bonjour!';
        });
    }

    /** @test */
    public function it_sends_template_message_successfully()
    {
        $service = $this->getConfiguredService();

        Http::fake([
            'test.api.infobip.com/whatsapp/1/message/template' => Http::response([
                'messages' => [
                    [
                        'to' => '2250700000000',
                        'messageCount' => 1,
                        'messageId' => 'tpl-123',
                        'status' => [
                            'groupId' => 1,
                            'groupName' => 'PENDING',
                        ],
                    ],
                ],
                'bulkId' => 'bulk-456',
            ], 200),
        ]);

        $result = $service->sendTemplate(
            to: '+2250700000000',
            templateName: 'order_confirmed',
            language: 'fr',
            placeholders: ['Jean', 'CMD-001', 'Pharmacie du Plateau'],
        );

        $this->assertTrue($result);

        Http::assertSent(function ($request) {
            $message = $request['messages'][0];
            return $message['content']['templateName'] === 'order_confirmed'
                && $message['content']['language'] === 'fr'
                && $message['content']['templateData']['body']['placeholders'] === ['Jean', 'CMD-001', 'Pharmacie du Plateau'];
        });
    }

    /** @test */
    public function it_sends_template_with_header_and_buttons()
    {
        $service = $this->getConfiguredService();

        Http::fake([
            'test.api.infobip.com/whatsapp/1/message/template' => Http::response([
                'messages' => [
                    [
                        'messageId' => 'tpl-789',
                        'status' => ['groupName' => 'PENDING'],
                    ],
                ],
            ], 200),
        ]);

        $result = $service->sendTemplate(
            to: '+2250700000000',
            templateName: 'order_confirmed',
            placeholders: ['Jean', 'CMD-001'],
            header: ['type' => 'TEXT', 'placeholder' => 'Commande CMD-001'],
            buttons: [['type' => 'QUICK_REPLY', 'parameter' => 'confirm']],
        );

        $this->assertTrue($result);

        Http::assertSent(function ($request) {
            $tplData = $request['messages'][0]['content']['templateData'];
            return isset($tplData['header'])
                && isset($tplData['buttons']);
        });
    }

    /** @test */
    public function it_sends_image_message_successfully()
    {
        $service = $this->getConfiguredService();

        Http::fake([
            'test.api.infobip.com/whatsapp/1/message/image' => Http::response([
                'messageId' => 'img-123',
                'status' => ['groupName' => 'PENDING'],
            ], 200),
        ]);

        $result = $service->sendImage(
            to: '+2250700000000',
            imageUrl: 'https://example.com/prescription.jpg',
            caption: 'Votre ordonnance',
        );

        $this->assertTrue($result);

        Http::assertSent(function ($request) {
            return $request['content']['mediaUrl'] === 'https://example.com/prescription.jpg'
                && $request['content']['caption'] === 'Votre ordonnance';
        });
    }

    /** @test */
    public function it_sends_document_message_successfully()
    {
        $service = $this->getConfiguredService();

        Http::fake([
            'test.api.infobip.com/whatsapp/1/message/document' => Http::response([
                'messageId' => 'doc-123',
                'status' => ['groupName' => 'PENDING'],
            ], 200),
        ]);

        $result = $service->sendDocument(
            to: '+2250700000000',
            documentUrl: 'https://example.com/facture.pdf',
            filename: 'facture_CMD001.pdf',
            caption: 'Facture de votre commande',
        );

        $this->assertTrue($result);

        Http::assertSent(function ($request) {
            return $request['content']['mediaUrl'] === 'https://example.com/facture.pdf'
                && $request['content']['filename'] === 'facture_CMD001.pdf';
        });
    }

    /** @test */
    public function it_sends_location_message_successfully()
    {
        $service = $this->getConfiguredService();

        Http::fake([
            'test.api.infobip.com/whatsapp/1/message/location' => Http::response([
                'messageId' => 'loc-123',
                'status' => ['groupName' => 'PENDING'],
            ], 200),
        ]);

        $result = $service->sendLocation(
            to: '+2250700000000',
            latitude: 5.3411,
            longitude: -4.0280,
            name: 'Pharmacie du Plateau',
            address: 'Rue du Commerce, Abidjan',
        );

        $this->assertTrue($result);

        Http::assertSent(function ($request) {
            return $request['content']['latitude'] === 5.3411
                && $request['content']['longitude'] === -4.0280
                && $request['content']['name'] === 'Pharmacie du Plateau';
        });
    }

    /** @test */
    public function it_sends_order_status_message_successfully()
    {
        $service = $this->getConfiguredService();

        Http::fake([
            'test.api.infobip.com/whatsapp/1/message/interactive/order-status' => Http::response([
                'messageId' => 'os-123',
                'status' => ['groupName' => 'PENDING'],
            ], 200),
        ]);

        $result = $service->sendOrderStatus(
            to: '+2250700000000',
            orderReference: 'CMD-20260216-001',
            status: 'confirmed',
            description: 'Votre commande a été confirmée par la pharmacie.',
        );

        $this->assertTrue($result);

        Http::assertSent(function ($request) {
            return str_contains($request->url(), '/order-status')
                && $request['content']['orderStatus']['status'] === 'PROCESSING';
        });
    }

    /** @test */
    public function it_maps_order_statuses_correctly()
    {
        $service = $this->getConfiguredService();

        $statusMappings = [
            'confirmed' => 'PROCESSING',
            'preparing' => 'PROCESSING',
            'ready_for_pickup' => 'PARTIALLY_SHIPPED',
            'assigned' => 'SHIPPED',
            'on_the_way' => 'SHIPPED',
            'delivered' => 'COMPLETED',
            'cancelled' => 'CANCELED',
        ];

        foreach ($statusMappings as $appStatus => $whatsappStatus) {
            Http::fake([
                'test.api.infobip.com/*' => Http::response([
                    'messageId' => "os-{$appStatus}",
                    'status' => ['groupName' => 'PENDING'],
                ], 200),
            ]);

            $service->sendOrderStatus(
                to: '+2250700000000',
                orderReference: 'CMD-TEST',
                status: $appStatus,
                description: 'Test',
            );

            Http::assertSent(function ($request) use ($whatsappStatus) {
                return $request['content']['orderStatus']['status'] === $whatsappStatus;
            });
        }
    }

    /** @test */
    public function it_handles_api_error_on_text_message()
    {
        $service = $this->getConfiguredService();

        Http::fake([
            'test.api.infobip.com/*' => Http::response([
                'requestError' => [
                    'serviceException' => [
                        'messageId' => 'UNAUTHORIZED',
                        'text' => 'Invalid login details',
                    ],
                ],
            ], 401),
        ]);

        $result = $service->sendText('+2250700000000', 'Test message');

        $this->assertFalse($result);
    }

    /** @test */
    public function it_handles_network_exception()
    {
        $service = $this->getConfiguredService();

        Http::fake(function () {
            throw new \Exception('Connection timeout');
        });

        $result = $service->sendText('+2250700000000', 'Test message');

        $this->assertFalse($result);
    }

    /** @test */
    public function it_falls_back_to_log_when_not_configured()
    {
        config([
            'whatsapp.enabled' => false,
        ]);

        $service = new WhatsAppService();

        Log::shouldReceive('info')
            ->once()
            ->with(\Mockery::pattern('/log only/'), \Mockery::type('array'));

        $result = $service->sendText('+2250700000000', 'Test');

        $this->assertTrue($result);
    }

    /** @test */
    public function it_includes_sms_failover_when_configured()
    {
        config([
            'whatsapp.enabled' => true,
            'whatsapp.base_url' => 'https://test.api.infobip.com',
            'whatsapp.api_key' => 'test_api_key_123',
            'whatsapp.sender_number' => '2250100000000',
            'whatsapp.sms_failover.enabled' => true,
            'whatsapp.sms_failover.sender' => 'DR-PHARMA',
            'whatsapp.templates.order_confirmed.sms_fallback' => 'DR-PHARMA: Bonjour {1}, votre commande {2} a été confirmée par {3}.',
        ]);

        $service = new WhatsAppService();

        Http::fake([
            'test.api.infobip.com/whatsapp/1/message/template' => Http::response([
                'messages' => [
                    ['messageId' => 'tpl-fail', 'status' => ['groupName' => 'PENDING']],
                ],
            ], 200),
        ]);

        $service->sendTemplate(
            to: '+2250700000000',
            templateName: 'order_confirmed',
            placeholders: ['Jean', 'CMD-001', 'Pharmacie Test'],
        );

        Http::assertSent(function ($request) {
            return isset($request['messages'][0]['smsFailover'])
                && $request['messages'][0]['smsFailover']['from'] === 'DR-PHARMA'
                && str_contains($request['messages'][0]['smsFailover']['text'], 'Jean');
        });
    }
}
