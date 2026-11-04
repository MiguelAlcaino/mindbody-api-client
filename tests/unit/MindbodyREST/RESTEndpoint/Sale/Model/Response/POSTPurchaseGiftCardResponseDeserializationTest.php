<?php

declare(strict_types=1);

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodyREST\RESTEndpoint\Sale\Model\Response;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response\POSTPurchaseGiftCardResponse;
use PHPUnit\Framework\TestCase;

/**
 * PaymentProcessingFailures had no serializer type, which JMS refuses for an untyped property, so every
 * sale/purchasegiftcard response failed to deserialize, the successful ones included.
 */
class POSTPurchaseGiftCardResponseDeserializationTest extends TestCase
{
    private SerializerInterface $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = SerializerBuilder::create()->build();
    }

    public function testDeserializesTheSandboxResponse(): void
    {
        /** @var POSTPurchaseGiftCardResponse $response */
        $response = $this->serializer->deserialize(
            '{"BarcodeId":"576815414643","Value":550.0,"AmountPaid":550.0,"FromName":null,"LayoutId":0,'
            . '"EmailReceipt":false,"PurchaserClientId":"100000010","PurchaserEmail":"gabriel@example.com",'
            . '"RecipientEmail":null,"SaleId":1239,"PaymentProcessingFailures":null}',
            POSTPurchaseGiftCardResponse::class,
            'json',
        );

        $this->assertSame('576815414643', $response->getBarCodeId());
        $this->assertSame(550.0, $response->getValue());
        $this->assertSame(550.0, $response->getAmountPaid());
        $this->assertSame(1239, $response->getSaleId());
        $this->assertSame('100000010', $response->getPurchaserClientId());
        $this->assertSame('gabriel@example.com', $response->getPurchaserEmail());
        $this->assertNull($response->getRecipientEmail());
        $this->assertNull($response->getPaymentProcessingFailures());
    }

    public function testDeserializesPaymentProcessingFailuresAndAPurchaserWithoutEmail(): void
    {
        /** @var POSTPurchaseGiftCardResponse $response */
        $response = $this->serializer->deserialize(
            '{"BarcodeId":"","Value":550.0,"AmountPaid":0.0,"LayoutId":0,"EmailReceipt":false,'
            . '"PurchaserClientId":"100000010","PurchaserEmail":null,"SaleId":1240,'
            . '"PaymentProcessingFailures":[{"Type":"Custom","Message":"Declined"}]}',
            POSTPurchaseGiftCardResponse::class,
            'json',
        );

        $this->assertNull($response->getPurchaserEmail());
        $this->assertSame([['Type' => 'Custom', 'Message' => 'Declined']], $response->getPaymentProcessingFailures());
    }
}
