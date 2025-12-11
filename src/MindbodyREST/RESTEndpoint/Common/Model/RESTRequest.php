<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model;

use JMS\Serializer\Annotation as Serializer;

abstract class RESTRequest
{
    #[Serializer\SerializedName('Test')]
    private bool $test = false;

    #[Serializer\Exclude]
    private int $siteId;

    /**
     * @var array<string, mixed>
     */
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

    /**
     * @return array<string, mixed>
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array<string, mixed> $headers
     */
    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    abstract public function getMethod(): string;

    abstract public function getPath(): string;
}
