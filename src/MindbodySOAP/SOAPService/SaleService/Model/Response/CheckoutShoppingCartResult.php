<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;

class CheckoutShoppingCartResult extends AbstractBaseResultResponse
{
    /**
     * @var ShoppingCart
     * @Serializer\SerializedName("ShoppingCart")
     * @Serializer\Type("MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response\ShoppingCart")
     */
    private $shoppingCart;

    public function getMethodName(): string
    {
        return 'CheckoutShoppingCart';
    }


    public function getShoppingCart(): ShoppingCart
    {
        return $this->shoppingCart;
    }
}