<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model\ClientService;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;

class POSTUpdateClientServiceResponse extends RESTResponse
{
    public function __construct(
        #[Serializer\SerializedName('ClientService')]
        private readonly ClientService $clientService,
    ) {
    }

    public function getClientService(): ClientService
    {
        return $this->clientService;
    }
}
