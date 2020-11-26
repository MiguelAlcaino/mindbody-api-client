<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken;

use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\AbstractRESTRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken\Request\POSTIssueRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken\Response\POSTIssueResponse;

class UserTokenRESTRequester extends AbstractRESTRequester
{
    public function issueUserToken(POSTIssueRequest $request): POSTIssueResponse
    {
        return $this->executeRequest($request, POSTIssueResponse::class);
    }
}
