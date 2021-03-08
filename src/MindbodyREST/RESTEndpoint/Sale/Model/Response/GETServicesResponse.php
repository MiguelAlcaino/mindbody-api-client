<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Service;

class GETServicesResponse extends RESTResponse
{
    /**
     * @Serializer\SerializedName("Services")
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Service>")
     * @var ?Service[]
     */
    private ?array $services;

    public function getServices(): ?array
    {
        return $this->services;
    }
}
