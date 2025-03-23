<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model;

use JMS\Serializer\Annotation as Serializer;
class ErrorResponse
{
    #[Serializer\SerializedName("Message")]
    private string $message;

    #[Serializer\SerializedName("Code")]
    private string $code;

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}
