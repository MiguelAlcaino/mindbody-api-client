<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\CartItem;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\PaymentInfo;

class CheckoutShoppingCartParamsRequest extends AbstractParamsRequest
{
    #[Serializer\SerializedName('ClientID')]
    #[Serializer\Type('string')]
    #[Serializer\XmlElement(cdata: false)]
    private $clientId;

    /**
     * @var CartItem[] $cartItems
     */
    #[Serializer\SerializedName('CartItems')]
    #[Serializer\XmlList(entry: 'CartItem')]
    private array $cartItems;

    #[Serializer\SerializedName('Payments')]
    #[Serializer\XmlList(entry: 'PaymentInfo')]
    private $payments;

    #[Serializer\SerializedName('Test')]
    #[Serializer\Type('bool')]
    #[Serializer\XmlElement(cdata: false)]
    private bool $test;

    #[Serializer\SerializedName('Fields')]
    #[Serializer\XmlList(entry: 'string')]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('array<string>')]
    private $fields;

    #[Serializer\SerializedName('InStore')]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('bool')]
    private bool $inStore;

    #[Serializer\SerializedName('PromotionCode')]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('string')]
    private string $promotionCode;

    /**
     * @param CartItem[]    $cartItems
     * @param PaymentInfo[] $payments
     */
    public function __construct(
        string  $clientId,
        array   $cartItems,
        array   $payments,
        ?string $promotionCode = null,
        bool    $test = true,
    ) {
        $this->clientId      = $clientId;
        $this->cartItems     = $cartItems;
        $this->payments      = $payments;
        $this->promotionCode = $promotionCode;
        $this->test          = $test;
    }

    /**
     * @param string[] $fields
     */
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
