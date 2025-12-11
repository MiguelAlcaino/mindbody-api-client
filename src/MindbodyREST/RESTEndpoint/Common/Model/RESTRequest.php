<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model;

use JMS\Serializer\Annotation as Serializer;

abstract class RESTRequest
{
    #[Serializer\SerializedName('Test')]
    private bool $test = false;

    #[Serializer\Exclude]
    private int $siteId;

    #[Serializer\Exclude]
    private array $headers = [];

    public function setTest(bool $test): self
    {
        $this->test = $test;

        return $this;
    }

    public function setSiteId(int $siteId): self
    {
        $this->siteId = $siteId;

        return $this;
    }

    public function getSiteId(): int
    {
        return $this->siteId;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    public abstract function getMethod(): string;

    public abstract function getPath(): string;
}
