<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Enum\PaymentInfoTypeEnum;

class PaymentInfo
{
    /**
     * In case of $type=CustomPaymentInfo
     *
     * @var int
     * @Serializer\SerializedName("ID")
     * @Serializer\Type("int")
     */
    private $id;

    /**
     * @var float
     * @Serializer\SerializedName("Amount")
     * @Serializer\Type("float")
     */
    private $amount;

    /**
     * @var string
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("xsi:type")
     */
    private $type;

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

    public function getType(): PaymentInfoTypeEnum
    {
        return PaymentInfotypeEnum::from($this->type);
    }
}
