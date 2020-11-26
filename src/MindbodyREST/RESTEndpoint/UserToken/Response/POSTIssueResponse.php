<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken\Response;

use JMS\Serializer\Annotation as Serializer;

class POSTIssueResponse
{
    /**
     * @Serializer\SerializedName("TokenType")
     */
    private string $tokenType;

    /**
     * @Serializer\SerializedName("AccessToken")
     */
    private string $accessToken;

    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }
}
