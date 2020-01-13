<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model;

use JsonSerializable;

class CheckoutShoppingCartRequest implements JsonSerializable
{
    /** @var string */
    private $ClientID;

    /** @var CartItem[] */
    private $CartItems;

    /** @var PaymentInfo[] */
    private $Payments;

    /** @var bool */
    private $InStore;

    /** @var bool */
    private $Test;

    /** @var array */
    private $Fields;

    /** @var string */
    private $PromotionCode;

    public function __construct(string $ClientID, array $CartItems, bool $Test = true)
    {
        $this->ClientID  = $ClientID;
        $this->CartItems = $CartItems;
        $this->Test      = $Test;
        $this->InStore   = false;
    }

    public function jsonSerialize()
    {
        $jsonArray = [
            'ClientID'  => $this->ClientID,
            'CartItems' => [
                'CartItem' => $this->CartItems,
            ],
            'Test'      => $this->Test ? 'true' : 'false',
            'InStore'   => $this->InStore ? 'true' : 'false',
        ];

        if ($this->Payments !== null) {
            $jsonArray['Payments'] = [
                'PaymentInfo' => $this->Payments,
            ];
        }

        if ($this->PromotionCode !== null) {
            $jsonArray['PromotionCode'] = $this->PromotionCode;
        }

        if ($this->Fields !== null) {
            $jsonArray['Fields'] = [
                'string' => $this->Fields,
            ];
        }

        return $jsonArray;
    }

    public function isInStore(): bool
    {
        return $this->InStore;
    }

    public function setInStore(bool $InStore): CheckoutShoppingCartRequest
    {
        $this->InStore = $InStore;

        return $this;
    }

    public function getFields(): ?array
    {
        return $this->Fields;
    }

    /**
     * @param array $Fields
     *
     * @return CheckoutShoppingCartRequest
     */
    public function setFields(array $Fields): CheckoutShoppingCartRequest
    {
        $this->Fields = $Fields;

        return $this;
    }

    public function getPromotionCode(): ?string
    {
        return $this->PromotionCode;
    }

    public function setPromotionCode(?string $PromotionCode = null): CheckoutShoppingCartRequest
    {
        $this->PromotionCode = $PromotionCode;

        return $this;
    }

    /**
     * @return PaymentInfo[]
     */
    public function getPayments(): ?array
    {
        return $this->Payments;
    }

    /**
     * @param PaymentInfo[] $Payments
     *
     * @return CheckoutShoppingCartRequest
     */
    public function setPayments(array $Payments): CheckoutShoppingCartRequest
    {
        $this->Payments = $Payments;

        return $this;
    }
}
