<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Model\PaymentType;

class GETPaymentTypesResponse extends RESTResponse
{
    /**
     * @Serializer\SerializedName("PaymentTypes")
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Model\PaymentType>")
     * @var PaymentType[]
     */
    private array $paymentTypes;

    public function getPaymentTypes(): array
    {
        return $this->paymentTypes;
    }
}
