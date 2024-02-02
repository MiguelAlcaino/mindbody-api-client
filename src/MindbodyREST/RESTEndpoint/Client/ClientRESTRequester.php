<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client;

use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\RESTRequesterExecutor;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request\GETClientServicesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request\GETCrossRegionalClientAssociationRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request\POSTUpdateClientRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\GETClientServicesResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\GETCrossRegionalClientAssociationResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\POSTUpdateClientResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\ResponseExceptionHandler;

class ClientRESTRequester
{
    private RESTRequesterExecutor    $restRequester;
    private ResponseExceptionHandler $responseExceptionHandler;

    public function __construct(
        RESTRequesterExecutor $RESTRequester,
        ResponseExceptionHandler $responseExceptionHandler
    ) {
        $this->restRequester            = $RESTRequester;
        $this->responseExceptionHandler = $responseExceptionHandler;
    }

    public function getClientServices(GETClientServicesRequest $request): GETClientServicesResponse
    {
        return $this->restRequester->executeRequest($request, GETClientServicesResponse::class);
    }

    public function getCrossRegionalClientAssociations(GETCrossRegionalClientAssociationRequest $request): GETCrossRegionalClientAssociationResponse
    {
        return $this->restRequester->executeRequest($request, GETCrossRegionalClientAssociationResponse::class);
    }

    public function postUpdateClient(POSTUpdateClientRequest $request): POSTUpdateClientResponse
    {
        return $this->restRequester->executeRequest($request, POSTUpdateClientResponse::class);
    }
}
