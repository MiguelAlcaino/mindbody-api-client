<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site;

use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\RESTRequesterExecutor;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\ResponseExceptionHandler;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Request\GETPaymentTypesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Request\GETProgramsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Response\GETPaymentTypesResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Response\GETProgramsResponse;

class SiteRESTRequester
{
    private RESTRequesterExecutor $restRequester;
    private ResponseExceptionHandler $responseExceptionHandler;

    public function __construct(
        RESTRequesterExecutor    $RESTRequester,
        ResponseExceptionHandler $responseExceptionHandler,
    ) {
        $this->restRequester            = $RESTRequester;
        $this->responseExceptionHandler = $responseExceptionHandler;
    }

    public function getPaymentTypes(GETPaymentTypesRequest $request): GETPaymentTypesResponse
    {
        return $this->restRequester->executeRequest($request, GETPaymentTypesResponse::class);
    }

    public function getPrograms(GETProgramsRequest $request): GETProgramsResponse
    {
        return $this->restRequester->executeRequest($request, GETProgramsResponse::class);
    }
}
