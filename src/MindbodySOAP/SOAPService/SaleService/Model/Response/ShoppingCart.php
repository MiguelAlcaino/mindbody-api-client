<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\CartItem;

class ShoppingCart
{
    /**
     * @var int
     * @Serializer\SerializedName("ID")
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     */
    private $id;

    /**
     * @var CartItem[]
     * @Serializer\SerializedName("CartItems")
     * @Serializer\XmlList(entry="CartItem")
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\CartItem>")
     */
    private $cartItems;

    /**
     * @var float
     * @Serializer\SerializedName("SubTotal")
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false)
     */
    private $subTotal;

    /**
     * @var float
     * @Serializer\SerializedName("DiscountTotal")
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false)
     */
    private $discountTotal;

    /**
     * @var float
     * @Serializer\SerializedName("TaxTotal")
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false))
     */
    private $taxTotal;

    /**
     * @var float
     * @Serializer\SerializedName("GrandTotal")
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false)
     */
    private $grandTotal;

    /**
     * @return int
     */
    public function getId(): int
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