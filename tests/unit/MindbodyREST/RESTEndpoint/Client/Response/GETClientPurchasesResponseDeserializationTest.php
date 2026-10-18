<?php

declare(strict_types=1);

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodyREST\RESTEndpoint\Client\Response;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\GETClientPurchasesResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model\Sale;
use PHPUnit\Framework\TestCase;

class GETClientPurchasesResponseDeserializationTest extends TestCase
{
    private SerializerInterface $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = SerializerBuilder::create()->build();
    }

    public function testDeserializesSaleWithoutOptionalKeys(): void
    {
        $sale = $this->deserializeFirstSale($this->getPurchasesPayloadWithoutOptionalKeys());

        $this->assertSame(72463, $sale->getId());
        $this->assertNull($sale->getLocationId());
        $this->assertSame([], $sale->getPayments());

        $purchasedItem = $sale->getPurchasedItems()[0];

        $this->assertSame(103418, $purchasedItem->getId());
        $this->assertTrue($purchasedItem->isService());
        $this->assertNull($purchasedItem->getExpDate());
        $this->assertNull($purchasedItem->getActiveDate());
        $this->assertNull($purchasedItem->getSaleDetailId());
        $this->assertNull($purchasedItem->getDescription());
        $this->assertNull($purchasedItem->getTotalAmount());
        $this->assertNull($purchasedItem->isReturned());
        $this->assertNull($purchasedItem->getNotes());
    }

    public function testDeserializesPaymentWithoutOptionalKeys(): void
    {
        $sale = $this->deserializeFirstSale($this->getPurchasesPayloadWithEmptyPayment());

        $this->assertCount(1, $sale->getPayments());

        $payment = $sale->getPayments()[0];

        $this->assertNull($payment->getId());
        $this->assertNull($payment->getAmount());
        $this->assertNull($payment->getMethod());
        $this->assertNull($payment->getType());
        $this->assertNull($payment->getNotes());
        $this->assertNull($payment->getTransactionId());
    }

    public function testDeserializesSaleWithAllNewKeys(): void
    {
        $sale = $this->deserializeFirstSale($this->getPurchasesPayload());

        $this->assertSame(72463, $sale->getId());
        $this->assertSame('2026-10-17 13:08:58', $sale->getSaleDatetime()->format('Y-m-d H:i:s'));
        $this->assertSame('100012707', $sale->getClientId());
        $this->assertSame(3, $sale->getLocationId());

        $purchasedItem = $sale->getPurchasedItems()[0];

        $this->assertSame(103418, $purchasedItem->getId());
        $this->assertSame(205111, $purchasedItem->getSaleDetailId());
        $this->assertSame('TS-First Timer Trial 3 Pack', $purchasedItem->getDescription());
        $this->assertSame(230.0, $purchasedItem->getTotalAmount());
        $this->assertFalse($purchasedItem->isReturned());
        $this->assertNull($purchasedItem->getNotes());
        $this->assertSame('2026-10-17 00:00:00', $purchasedItem->getActiveDate()?->format('Y-m-d H:i:s'));
        $this->assertSame('2026-11-16 00:00:00', $purchasedItem->getExpDate()?->format('Y-m-d H:i:s'));

        $notedItem = $sale->getPurchasedItems()[1];

        $this->assertSame('crank-ref-1', $notedItem->getNotes());
        $this->assertTrue($notedItem->isReturned());

        $payments = $sale->getPayments();

        $this->assertCount(1, $payments);
        $this->assertSame(88001, $payments[0]->getId());
        $this->assertSame(230.0, $payments[0]->getAmount());
        $this->assertSame(17, $payments[0]->getMethod());
        $this->assertSame('Payfort', $payments[0]->getType());
        $this->assertSame('', $payments[0]->getNotes());
        $this->assertSame(990011, $payments[0]->getTransactionId());
    }

    private function deserializeFirstSale(string $payload): Sale
    {
        /** @var GETClientPurchasesResponse $response */
        $response = $this->serializer->deserialize($payload, GETClientPurchasesResponse::class, 'json');

        $this->assertCount(1, $response->getPurchases());

        return $response->getPurchases()[0]->getSale();
    }

    private function getPurchasesPayloadWithoutOptionalKeys(): string
    {
        return $this->wrapSale(
            <<<'JSON'
                {
                    "Id": 72463,
                    "SaleDateTime": "2026-10-17T13:08:58Z",
                    "ClientId": "100012707",
                    "PurchasedItems": [
                        {
                            "Id": 103418,
                            "IsService": true
                        }
                    ]
                }
                JSON,
        );
    }

    private function getPurchasesPayloadWithEmptyPayment(): string
    {
        return $this->wrapSale(
            <<<'JSON'
                {
                    "Id": 72463,
                    "SaleDateTime": "2026-10-17T13:08:58Z",
                    "ClientId": "100012707",
                    "PurchasedItems": [],
                    "Payments": [{}]
                }
                JSON,
        );
    }

    private function getPurchasesPayload(): string
    {
        return $this->wrapSale(
            <<<'JSON'
                {
                    "Id": 72463,
                    "SaleDateTime": "2026-10-17T13:08:58Z",
                    "ClientId": "100012707",
                    "LocationId": 3,
                    "PurchasedItems": [
                        {
                            "Id": 103418,
                            "SaleDetailId": 205111,
                            "IsService": true,
                            "Description": "TS-First Timer Trial 3 Pack",
                            "TotalAmount": 230.0,
                            "Returned": false,
                            "Notes": null,
                            "ActiveDate": "2026-10-17T00:00:00",
                            "ExpDate": "2026-11-16T00:00:00"
                        },
                        {
                            "Id": 103419,
                            "IsService": true,
                            "Returned": true,
                            "Notes": "crank-ref-1"
                        }
                    ],
                    "Payments": [
                        {
                            "Id": 88001,
                            "Type": "Payfort",
                            "Method": 17,
                            "Amount": 230.0,
                            "Notes": "",
                            "TransactionId": 990011
                        }
                    ]
                }
                JSON,
        );
    }

    private function wrapSale(string $saleJson): string
    {
        return <<<JSON
            {
                "PaginationResponse": {
                    "RequestedLimit": 100,
                    "RequestedOffset": 0,
                    "PageSize": 1,
                    "TotalResults": 1
                },
                "Purchases": [
                    {
                        "Sale": {$saleJson},
                        "Description": "TS-First Timer Trial 3 Pack",
                        "AccountPayment": false,
                        "Price": 230.0,
                        "AmountPaid": 230.0,
                        "Discount": 0.0,
                        "Tax": 0.0,
                        "Returned": false,
                        "Quantity": 1
                    }
                ]
            }
            JSON;
    }
}
