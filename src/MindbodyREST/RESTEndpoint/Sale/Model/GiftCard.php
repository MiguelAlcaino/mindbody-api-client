<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model;

use JMS\Serializer\Annotation as Serializer;

class GiftCard
{
    /**
     * @Serializer\SerializedName("Id")
     */
    private int $id;

    /**
     * @Serializer\SerializedName("Description")
     */
    private string $description;

    /**
     * @Serializer\SerializedName("SalePrice")
     */
    private float $cardValue;

    /**
     * @Serializer\SerializedName("SalePrice")
     */
    private float $salePrice;

    /**
     * @Serializer\SerializedName("SoldOnline")
     */
    private bool $soldOnline;

    /**
     * @Serializer\SerializedName("GiftCardTerms")
     */
    private string $giftCardTerms;

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCardValue(): float
    {
        return $this->cardValue;
    }

    public function getSalePrice(): float
    {
        return $this->salePrice;
    }

    public function isSoldOnline(): bool
    {
        return $this->soldOnline;
    }

    public function getGiftCardTerms(): string
    {
        return $this->giftCardTerms;
    }
}
