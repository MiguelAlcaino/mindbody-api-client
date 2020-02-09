<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractSOAPMethod;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestContainer;

class CheckoutShoppingCartRequest extends AbstractSOAPMethod
{
    /**
     * @var RequestContainer
     * @Serializer\SerializedName("CheckoutShoppingCart")
     */
    protected $soapMethodName;

}