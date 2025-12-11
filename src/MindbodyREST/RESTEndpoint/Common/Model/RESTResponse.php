<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model;

use JMS\Serializer\Annotation as Serializer;

abstract class RESTResponse
{
    private string $payload;

    #[Serializer\SerializedName('Error')]
    #[Serializer\SkipWhenEmpty]
    private ?ErrorResponse $error = null;

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function setPayload(string $payload): self
    {
        $this->payload = $payload;

        return $this;
    }

    public function getError(): ?ErrorResponse
    {
        return $this->error;
    }
}
