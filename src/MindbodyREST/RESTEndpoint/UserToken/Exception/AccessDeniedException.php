<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken\Exception;

use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Exception\MindbodyRESTResponseException;

class AccessDeniedException extends MindbodyRESTResponseException
{
    public static function create(string $message): self
    {
        return new self($message);
    }
}
