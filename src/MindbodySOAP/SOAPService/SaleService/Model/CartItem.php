<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model;

use JMS\Serializer\Annotation as Serializer;

class CartItem
{
    /**
     * @var Item
     * @Serializer\SerializedName("Item")
     * @Serializer\Type("MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Item")
     */
    private $item;

    /**
     * @var int
     * @Serializer\SerializedName("Quantity")
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     */
    private $quantity;

    /**
     * @var float
     * @Serializer\SerializedName("DiscountAmount")
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false)
     */
    private $discountAmount;

    /**
     * CartItemRequest constructor.
     *
     * @param Item  $Item
     * @param int   $Quantity
     * @param float $DiscountAmount
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
