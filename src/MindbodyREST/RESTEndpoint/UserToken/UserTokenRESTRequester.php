<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken;

use GuzzleHttp\Exception\ClientException;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\RESTRequesterExecutor;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\ResponseExceptionHandler;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken\Request\POSTIssueRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken\Response\POSTIssueResponse;

class UserTokenRESTRequester
{
    private RESTRequesterExecutor $restRequester;
    private ResponseExceptionHandler $responseExceptionHandler;

    public function __construct(
        RESTRequesterExecutor    $restRequester,
        ResponseExceptionHandler $responseExceptionHandler,
    ) {
        $this->restRequester            = $restRequester;
        $this->responseExceptionHandler = $responseExceptionHandler;
    }

    public function issueUserToken(POSTIssueRequest $request): POSTIssueResponse
    {
        try {
            return $this->restRequester->executeRequest($request, POSTIssueResponse::class);
        } catch (ClientException $exception) {
            throw $this->responseExceptionHandler->getMindbodyException($exception);
        }
    }
}
