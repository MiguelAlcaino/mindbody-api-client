<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAPRequest\SOAPService\SaleService\Model;

class CartItem implements \JsonSerializable
{
    /**
     * @var Item
     */
    private $Item;

    /**
     * @var int
     */
    private $Quantity;

    /**
     * @var float
     */
    private $DiscountAmount;

    /**
     * CartItemRequest constructor.
     *
     * @param Item  $Item
     * @param int   $Quantity
     * @param float $DiscountAmount
     */
    public function __construct(Item $Item, int $Quantity, float $DiscountAmount = 0)
    {
        $this->Item           = $Item;
        $this->Quantity       = $Quantity;
        $this->DiscountAmount = $DiscountAmount;
    }

    public function jsonSerialize()
    {
        return [
            'Item' => $this->Item,
            'Quantity' => $this->Quantity,
            'DiscountAmount' => $this->DiscountAmount
        ];
    }

    /**
     * @return Item
     */
    public function getItem(): Item
    {
        return $this->Item;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->Quantity;
    }

    /**
     * @return float
     */
    public function getDiscountAmount(): float
    {
        return $this->DiscountAmount;
    }
}
