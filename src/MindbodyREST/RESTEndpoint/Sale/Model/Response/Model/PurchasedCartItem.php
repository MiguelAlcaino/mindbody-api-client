<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response\Model;

use JMS\Serializer\Annotation as Serializer;

class PurchasedCartItem
{
    /**
     * @Serializer\SerializedName("Id")
     */
    private ?string $id;

    /**
     * @Serializer\SerializedName("Name")
     */
    private string $name;

    /**
     * @Serializer\SerializedName("Count")
     */
    private int $count;

    /**
     * @Serializer\SerializedName("Price")
     */
    private float $price;

    /**
     * @Serializer\SerializedName("TaxRate")
     */
    private float $taxRate;

    /**
     * @Serializer\SerializedName("ProductId")
     */
    private string $productId;

    /**
     * @Serializer\SerializedName("ProgramId")
     * @Serializer\SkipWhenEmpty
     */
    private int $programId;

    /**
     * @Serializer\SerializedName("TaxIncluded")
     */
    private float $taxIncluded;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getTaxRate(): float
    {
        return $this->taxRate;
    }

    public function getProductId(): string
    {
        return $this->productId;
    }

    public function getTaxIncluded(): float
    {
        return $this->taxIncluded;
    }
}
