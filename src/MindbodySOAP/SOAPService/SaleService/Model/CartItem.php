<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model;

use JMS\Serializer\Annotation as Serializer;

class CartItem
{
    #[Serializer\SerializedName('Item')]
    #[Serializer\Type("MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Item")]
    private $item;

    #[Serializer\SerializedName('Quantity')]
    #[Serializer\Type('int')]
    #[Serializer\XmlElement(cdata: false)]
    private int $quantity;

    #[Serializer\SerializedName('DiscountAmount')]
    #[Serializer\Type('float')]
    #[Serializer\XmlElement(cdata: false)]
    private float $discountAmount;

    /**
     * CartItemRequest constructor.
     */
    public function __construct(Item $Item, int $Quantity, float $DiscountAmount = 0)
    {
        $this->item           = $Item;
        $this->quantity       = $Quantity;
        $this->discountAmount = $DiscountAmount;
    }

    public function getItem(): Item
    {
        return $this->item;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getDiscountAmount(): float
    {
        return $this->discountAmount;
    }
}
