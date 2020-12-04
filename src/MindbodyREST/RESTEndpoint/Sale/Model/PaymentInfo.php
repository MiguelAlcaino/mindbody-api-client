<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model;

use JMS\Serializer\Annotation as Serializer;

class PaymentInfo
{
    /**
     * @var string
     * @Serializer\SerializedName("Type")
     */
    private string $type;

    /**
     * @Serializer\SerializedName("Metadata")
     */
    private PaymentMetadata $paymentMetadata;

    public function __construct(PaymentInfoTypeEnum $type, PaymentMetadata $metadata)
    {
        $this->type            = $type->value;
        $this->paymentMetadata = $metadata;
    }

    public function getType(): PaymentInfoTypeEnum
    {
        return PaymentInfoTypeEnum::make($this->type);
    }
}
