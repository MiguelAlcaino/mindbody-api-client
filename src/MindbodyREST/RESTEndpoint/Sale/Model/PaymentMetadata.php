<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model;

use JMS\Serializer\Annotation as Serializer;

class PaymentMetadata
{
    /**
     * @Serializer\SerializedName("Amount")
     * @Serializer\Type("float")
     */
    private float $amount;
    /**
     * In case of $type=CustomPaymentInfo
     *
     * @Serializer\SerializedName("Id")
     * @Serializer\SkipWhenEmpty
     */
    private ?int $id;

    /**
     * @Serializer\SerializedName("CardNumber")
     * @Serializer\SkipWhenEmpty
     */
    private ?string $cardNumber;

    /**
     * @Serializer\SerializedName("Notes")
     * @Serializer\SkipWhenEmpty
     */
    private ?string $notes;

    public function __construct(float $amount)
    {
        $this->amount     = $amount;
        $this->id         = null;
        $this->cardNumber = null;
        $this->notes      = null;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setCardNumber(string $cardNumber): self
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    public function setNotes(string $notes): PaymentMetadata
    {
        $this->notes = $notes;

        return $this;
    }
}
