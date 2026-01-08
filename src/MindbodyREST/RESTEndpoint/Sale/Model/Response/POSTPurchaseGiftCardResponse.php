<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;

/**
 * {
 * "BarcodeId": "576815414643",
 * "Value": 550.0,
 * "AmountPaid": 550.0,
 * "FromName": null,
 * "LayoutId": 0,
 * "EmailReceipt": false,
 * "PurchaserClientId": "100000010",
 * "PurchaserEmail": "gabrielcorrearamirez@gmail.com",
 * "RecipientEmail": null,
 * "SaleId": 1239,
 * "PaymentProcessingFailures": null
 * }.
 */
class POSTPurchaseGiftCardResponse extends RESTResponse
{
    #[Serializer\SerializedName('BarcodeId')]
    private string $barCodeId;
    #[Serializer\SerializedName('Value')]
    private float $value;
    #[Serializer\SerializedName('AmountPaid')]
    private float $amountPaid;
    #[Serializer\SerializedName('FromName')]
    private ?string $fromName = null;
    #[Serializer\SerializedName('LayoutId')]
    private int $layoutId;
    #[Serializer\SerializedName('EmailReceipt')]
    private bool $emailReceipt;
    #[Serializer\SerializedName('PurchaserClientId')]
    private string $purchaserClientId;
    #[Serializer\SerializedName('PurchaserEmail')]
    private string $purchaserEmail;
    #[Serializer\SerializedName('RecipientEmail')]
    private ?string $recipientEmail = null;
    #[Serializer\SerializedName('SaleId')]
    private int $saleId;
    #[Serializer\SerializedName('PaymentProcessingFailures')]
    private mixed $paymentProcessingFailures = null;

    public function getBarCodeId(): string
    {
        return $this->barCodeId;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getAmountPaid(): float
    {
        return $this->amountPaid;
    }

    public function getFromName(): ?string
    {
        return $this->fromName;
    }

    public function getLayoutId(): int
    {
        return $this->layoutId;
    }

    public function isEmailReceipt(): bool
    {
        return $this->emailReceipt;
    }

    public function getPurchaserClientId(): string
    {
        return $this->purchaserClientId;
    }

    public function getPurchaserEmail(): string
    {
        return $this->purchaserEmail;
    }

    public function getRecipientEmail(): ?string
    {
        return $this->recipientEmail;
    }

    public function getSaleId(): int
    {
        return $this->saleId;
    }

    public function getPaymentProcessingFailures(): mixed
    {
        return $this->paymentProcessingFailures;
    }
}
