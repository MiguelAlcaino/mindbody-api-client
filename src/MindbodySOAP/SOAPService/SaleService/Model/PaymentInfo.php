<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Enum\PaymentInfoTypeEnum;

class PaymentInfo
{
    /**
     * In case of $type=CustomPaymentInfo
     */
    #[Serializer\SerializedName("ID")]
    #[Serializer\Type("int")]
    private int $id;

    #[Serializer\SerializedName("Amount")]
    #[Serializer\Type("float")]
    private float $amount;

    #[Serializer\XmlAttribute]
    #[Serializer\SerializedName("xsi:type")]
    private string $type;

    public function __construct(float $amount, PaymentInfoTypeEnum $type)
    {
        $this->amount = $amount;
        $this->type   = $type->value;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getType(): string
    {
        return $this->type;
    }
    
    public function getEnum(): PaymentInfoTypeEnum
    {
        return PaymentInfoTypeEnum::from($this->type);
    }
}
