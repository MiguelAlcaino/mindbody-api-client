<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model;

class PaymentInfo implements \JsonSerializable
{
    /**
     * In case of $type=CustomPaymentInfo
     *
     * @var int
     */
    private $ID;

    /**
     * @var float
     */
    private $Amount;

    /**
     * @var string
     */
    private $type;

    /**
     * PaymentInfoRequest constructor.
     *
     * @param float  $Amount
     * @param string $type
     */
    public function __construct(float $Amount, string $type = 'CustomPaymentInfo')
    {
        $this->Amount = $Amount;
        $this->type   = $type;
    }

    public function jsonSerialize()
    {
        $jsonArray = [
            '_attributes' => [
                'xsi:type' => $this->type,
            ],
            'Amount'      => $this->Amount,
        ];

        if ($this->ID !== null) {
            $jsonArray['ID'] = $this->ID;
        }

        return $jsonArray;
    }

    /**
     * @return int
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * @param int $ID
     *
     * @return PaymentInfo
     */
    public function setID(int $ID): PaymentInfo
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->Amount;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}