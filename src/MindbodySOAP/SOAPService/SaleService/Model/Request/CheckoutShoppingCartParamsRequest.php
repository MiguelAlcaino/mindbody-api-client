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
     * @var string[]
     * @Serializer\SerializedName("Fields")
     * @Serializer\XmlList(entry="string")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("array<string>")
     */
    private $fields;

    /**
     * @var boolean
     * @Serializer\SerializedName("InStore")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("bool")
     */
    private $inStore;

    /**
     * @var string
     * @Serializer\SerializedName("PromotionCode")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("string")
     */
    private $promotionCode;

    /**
     * @param string        $clientId
     * @param CartItem[]    $cartItems
     * @param PaymentInfo[] $payments
     * @param null|string   $promotionCode
     * @param bool          $test
     */
    public function __construct(
        string $clientId,
        array $cartItems,
        array $payments,
        ?string $promotionCode = null,
        bool $test = true
    ) {
        $this->clientId      = $clientId;
        $this->cartItems     = $cartItems;
        $this->payments      = $payments;
        $this->promotionCode = $promotionCode;
        $this->test          = $test;
    }

    public function setFields(array $fields): self
    {
        $this->fields = $fields;

        return $this;
    }

    public function setInStore(bool $inStore): self
    {
        $this->inStore = $inStore;

        return $this;
    }
}