<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Model\PaymentType;

class GETPaymentTypesResponse extends RESTResponse
{
    /**
     * @var array<PaymentType>
     */
    #[Serializer\SerializedName("PaymentTypes")]
    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Model\PaymentType>")]
    private array $paymentTypes;

    /**
     * @return array<PaymentType>
     */
    public function getPaymentTypes(): array
    {
        return $this->paymentTypes;
    }
}
