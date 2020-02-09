<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestParamsInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\CartItem;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\PaymentInfo;

class CheckoutShoppingCartParamsRequest implements RequestParamsInterface
{
    /**
     * @var string
     * @Serializer\SerializedName("ClientID")
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     */
    private $clientId;

    /**
     * @var CartItem[]
     * @Serializer\SerializedName("CartItems")
     * @Serializer\XmlList(entry="CartItem")
     */
    private $cartItems;

    /**
     * @var PaymentInfo[]
     * @Serializer\SerializedName("Payments")
     * @Serializer\XmlList(entry="PaymentInfo")
     */
    private $payments;

    /**
     * @var bool
     * @Serializer\SerializedName("Test")
     * @Serializer\Type("bool")
     * @Serializer\XmlElement(cdata=false)
     */
    private $test;

    /**
     * @param string        $clientId
     * @param CartItem[]    $cartItems
     * @param PaymentInfo[] $payments
     * @param bool          $test
     */
    public function __construct(string $clientId, array $cartItems, array $payments, bool $test = true)
    {
        $this->clientId  = $clientId;
        $this->cartItems = $cartItems;
        $this->payments  = $payments;
        $this->test      = $test;
    }

}