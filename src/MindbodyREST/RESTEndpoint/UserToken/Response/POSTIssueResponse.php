<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;

class POSTIssueResponse extends RESTResponse
{
    #[Serializer\SerializedName("TokenType")]
    private string $tokenType;

    #[Serializer\SerializedName("AccessToken")]
    private string $accessToken;

    #[Serializer\SerializedName("Expires")]
    private string $expires;

    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getExpires(): string
    {
        return $this->expires;
    }
}
