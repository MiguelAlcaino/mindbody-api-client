<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response\Model;

use JMS\Serializer\Annotation as Serializer;

class ShoppingCart
{
    /**
     * @Serializer\SerializedName("Id")
     */
    private string $id;

    /**
     * @var CartItem[]
     * @Serializer\SerializedName("CartItems")
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response\Model\CartItem>")
     */
    private array $cartItems;

    /**
     * @Serializer\SerializedName("SubTotal")
     */
    private float $subTotal;

    /**
     * @Serializer\SerializedName("DiscountTotal")
     */
    private float $discountTotal;

    /**
     * @Serializer\SerializedName("TaxTotal")
     */
    private float $taxTotal;

    /**
     * @Serializer\SerializedName("GrandTotal")
     */
    private float $grandTotal;

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return CartItem[]
     */
    public function getCartItems(): array
    {
        return $this->cartItems;
    }

    public function getSubTotal(): float
    {
        return $this->subTotal;
    }

    public function getDiscountTotal(): float
    {
        return $this->discountTotal;
    }

    public function getTaxTotal(): float
    {
        return $this->taxTotal;
    }

    public function getGrandTotal(): float
    {
        return $this->grandTotal;
    }
}
