<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken\Exception;

use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Exception\MindbodyRESTResponseException;
use Throwable;

class AccessDeniedException extends MindbodyRESTResponseException
{
    public static function create(string $message, ?Throwable $previousException = null): self
    {
        return new self($message, 0, $previousException);
    }
}
