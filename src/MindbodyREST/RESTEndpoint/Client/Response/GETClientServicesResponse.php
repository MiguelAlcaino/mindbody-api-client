<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model\ClientService;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;

class GETClientServicesResponse extends RESTResponse
{
    /**
     * @Serializer\SerializedName("ClientServices")
     * @Serializer\Type(array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Model\ClientService>)
     * @var ClientService[]
     */
    private array $clientServices;

    /**
     * @return ClientService[]
     */
    public function getClientServices(): array
    {
        return $this->clientServices;
    }
}
