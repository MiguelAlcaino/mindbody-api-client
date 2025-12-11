<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Model\Client;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;

class GETClientsResponse extends RESTResponse
{
    /**
     * @var array<Client>
     */
    #[Serializer\SerializedName("Clients")]
    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Model\Client>")]
    private array $clients;

    /**
     * @return array<Client>
     */
    public function getClients(): array
    {
        return $this->clients;
    }
}
