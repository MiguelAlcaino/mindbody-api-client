<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken;

use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\RESTRequesterExecutor;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken\Request\POSTIssueRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken\Response\POSTIssueResponse;

class UserTokenRESTRequester
{
    private RESTRequesterExecutor $restRequester;

    public function __construct(RESTRequesterExecutor $restRequester)
    {
        $this->restRequester = $restRequester;
    }

    public function issueUserToken(POSTIssueRequest $request): POSTIssueResponse
    {
        return $this->restRequester->executeRequest($request, POSTIssueResponse::class);
    }
}
