<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response\Model\ShoppingCart;

class POSTCheckoutShoppingCartResponse extends RESTResponse
{
    #[Serializer\SerializedName('ShoppingCart')]
    #[Serializer\SkipWhenEmpty]
    private ?ShoppingCart $shoppingCart = null;

    public function getShoppingCart(): ?ShoppingCart
    {
        return $this->shoppingCart;
    }
}
