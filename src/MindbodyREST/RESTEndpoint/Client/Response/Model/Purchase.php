<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model;

use JMS\Serializer\Annotation as Serializer;

class Purchase
{
    /**
     * @Serializer\SerializedName("Sale")
     */
    private Sale $sale;
    /**
     * @Serializer\SerializedName("AmountPaid")
     */
    private float $amountPaid;
    /**
     * @Serializer\SerializedName("Price")
     */
    private float $price;
    /**
     * @Serializer\SerializedName("Discount")
     */
    private float $discount;
    /**
     * @Serializer\SerializedName("Tax")
     */
    private float $tax;
    /**
     * @Serializer\SerializedName("Returned")
     */
    private bool $returned;
    /**
     * @var int
     */
    private int $quantity;
    /**
     * @Serializer\SerializedName("Description")
     */
    private string $description;

    public function getSale(): Sale
    {
        return $this->sale;
    }

    public function getDescription(): string
    {
        return $this->description;
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