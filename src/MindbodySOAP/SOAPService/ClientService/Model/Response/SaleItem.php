<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class SaleItem
{
    #[Serializer\SerializedName("Sale")]
    #[Serializer\Type("MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\Sale")]
    #[Serializer\XmlElement(cdata: false)]
    private $sale;

    #[Serializer\SerializedName("Description")]
    #[Serializer\Type("string")]
    #[Serializer\XmlElement(cdata: false)]
    private string $description;

    #[Serializer\SerializedName("AccountPayment")]
    #[Serializer\Type("bool")]
    #[Serializer\XmlElement(cdata: false)]
    private $accountPayment;

    #[Serializer\SerializedName("Price")]
    #[Serializer\Type("float")]
    #[Serializer\XmlElement(cdata: false)]
    private float $price;

    #[Serializer\SerializedName("AmountPaid")]
    #[Serializer\Type("float")]
    #[Serializer\XmlElement(cdata: false)]
    private $amountPaid;

    #[Serializer\SerializedName("Discount")]
    #[Serializer\Type("float")]
    #[Serializer\XmlElement(cdata: false)]
    private float $discount;

    #[Serializer\SerializedName("Tax")]
    #[Serializer\Type("float")]
    #[Serializer\XmlElement(cdata: false)]
    private $tax;

    #[Serializer\SerializedName("Returned")]
    #[Serializer\Type("bool")]
    #[Serializer\XmlElement(cdata: false)]
    private bool $returned;

    #[Serializer\SerializedName("Quantity")]
    #[Serializer\Type("int")]
    #[Serializer\XmlElement(cdata: false)]
    private int $quantity;

    public function getSale(): Sale
    {
        return $this->sale;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isAccountPayment(): bool
    {
        return $this->accountPayment;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getAmountPaid(): float
    {
        return $this->amountPaid;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function getTax(): float
    {
        return $this->tax;
    }

    public function isReturned(): bool
    {
        return $this->returned;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
