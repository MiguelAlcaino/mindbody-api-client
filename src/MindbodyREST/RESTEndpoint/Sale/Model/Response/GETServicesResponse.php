<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Service;

class GETServicesResponse extends RESTResponse
{
    /**
     * @var array<Service>|null
     */
    #[Serializer\SerializedName('Services')]
    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Service>")]
    private ?array $services;

    /**
     * @return array<Service>|null
     */
    public function getServices(): ?array
    {
        return $this->services;
    }
}
