<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class SaleItem
{
    /**
     * @var Sale
     * @Serializer\SerializedName("Sale")
     * @Serializer\Type("MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\Sale")
     * @Serializer\XmlElement(cdata=false)
     */
    private $sale;

    /**
     * @var string
     * @Serializer\SerializedName("Description")
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     */
    private $description;

    /**
     * @var bool
     * @Serializer\SerializedName("AccountPayment")
     * @Serializer\Type("bool")
     * @Serializer\XmlElement(cdata=false)
     */
    private $accountPayment;

    /**
     * @var float
     * @Serializer\SerializedName("Price")
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false)
     */
    private $price;

    /**
     * @var float
     * @Serializer\SerializedName("AmountPaid")
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false)
     */
    private $amountPaid;

    /**
     * @var float
     * @Serializer\SerializedName("Discount")
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false)
     */
    private $discount;

    /**
     * @var float
     * @Serializer\SerializedName("Tax")
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false)
     */
    private $tax;

    /**
     * @var bool
     * @Serializer\SerializedName("Returned")
     * @Serializer\Type("bool")
     * @Serializer\XmlElement(cdata=false)
     */
    private $returned;

    /**
     * @var int
     * @Serializer\SerializedName("Quantity")
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     */
    private $quantity;

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