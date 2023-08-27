<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client;

use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\RESTRequesterExecutor;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request\POSTAddClientRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request\GETClientPurchasesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request\GETClientServicesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request\GETClientsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request\GETCrossRegionalClientAssociationRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\POSTAddClientResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\GETClientPurchasesResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\GETClientServicesResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\GETClientsResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\GETCrossRegionalClientAssociationResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\ResponseExceptionHandler;

class ClientRESTRequester
{
    private RESTRequesterExecutor $restRequester;
    private ResponseExceptionHandler $responseExceptionHandler;

    public function __construct(
        RESTRequesterExecutor    $RESTRequester,
        ResponseExceptionHandler $responseExceptionHandler
    )
    {
        $this->restRequester            = $RESTRequester;
        $this->responseExceptionHandler = $responseExceptionHandler;
    }

    public function getClientServices(GETClientServicesRequest $request): GETClientServicesResponse
    {
        return $this->restRequester->executeRequest($request, GETClientServicesResponse::class);
    }

    public function getCrossRegionalClientAssociations(
        GETCrossRegionalClientAssociationRequest $request
    ): GETCrossRegionalClientAssociationResponse
    {
        return $this->restRequester->executeRequest($request, GETCrossRegionalClientAssociationResponse::class);
    }

    public function getClients(GETClientsRequest $request): GETClientsResponse
    {
        return $this->restRequester->executeRequest($request, GETClientsResponse::class);
    }

    public function getClientPurchases(GETClientPurchasesRequest $request): GETClientPurchasesResponse
    {
        return $this->restRequester->executeRequest($request, GETClientPurchasesResponse::class);
    }

    public function addClient(POSTAddClientRequest $request): POSTAddClientResponse
    {
        return $this->restRequester->executeRequest($request, POSTAddClientResponse::class);
    }
}
