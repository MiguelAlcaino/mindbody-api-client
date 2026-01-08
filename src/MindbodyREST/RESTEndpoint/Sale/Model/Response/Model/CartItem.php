<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response\Model;

use JMS\Serializer\Annotation as Serializer;

class CartItem
{
    #[Serializer\SerializedName('Item')]
    #[Serializer\Type("MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response\Model\PurchasedCartItem")]
    private PurchasedCartItem $item;

    #[Serializer\SerializedName('DiscountAmount')]
    private float $discountAmount;

    #[Serializer\SerializedName('Id')]
    private int $id;

    #[Serializer\SerializedName('Quantity')]
    private int $quantity;

    public function getItem(): PurchasedCartItem
    {
        return $this->item;
    }

    public function getDiscountAmount(): float
    {
        return $this->discountAmount;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
