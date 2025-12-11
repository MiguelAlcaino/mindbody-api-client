<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Model\Client;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;

class POSTUpdateClientResponse extends RESTResponse
{
    #[Serializer\SerializedName('Client')]
    private Client $client;

    public function getClient(): Client
    {
        return $this->client;
    }
}
