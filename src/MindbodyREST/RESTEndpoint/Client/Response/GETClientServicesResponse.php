<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model\ClientService;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\PaginatedResponseInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\PaginatedResponseTrait;

class GETClientServicesResponse extends RESTResponse implements PaginatedResponseInterface
{
    use PaginatedResponseTrait;

    /**
     * @var array<ClientService>
     */
    #[Serializer\SerializedName("ClientServices")]
    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model\ClientService>")]
    private array $clientServices;

    /**
     * @return ClientService[]
     */
    public function getClientServices(): array
    {
        return $this->clientServices;
    }
}
