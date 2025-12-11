<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\CartItem;

class ShoppingCart
{
    #[Serializer\SerializedName('ID')]
    #[Serializer\Type('string')]
    #[Serializer\XmlElement(cdata: false)]
    private $id;

    #[Serializer\SerializedName('CartItems')]
    #[Serializer\XmlList(entry: 'CartItem')]
    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\CartItem>")]
    private array $cartItems;

    #[Serializer\SerializedName('SubTotal')]
    #[Serializer\Type('float')]
    #[Serializer\XmlElement(cdata: false)]
    private $subTotal;

    #[Serializer\SerializedName('DiscountTotal')]
    #[Serializer\Type('float')]
    #[Serializer\XmlElement(cdata: false)]
    private float $discountTotal;

    #[Serializer\SerializedName('TaxTotal')]
    #[Serializer\Type('float')]
    #[Serializer\XmlElement(cdata: false)]
    private $taxTotal;

    #[Serializer\SerializedName('GrandTotal')]
    #[Serializer\Type('float')]
    #[Serializer\XmlElement(cdata: false)]
    private float $grandTotal;

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
