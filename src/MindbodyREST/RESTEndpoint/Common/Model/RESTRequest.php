<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model;

use JMS\Serializer\Annotation as Serializer;

abstract class RESTRequest
{
    /**
     * @Serializer\SerializedName("Test")
     */
    private bool $test = false;

    /**
     * @Serializer\Exclude
     */
    private int $siteId;

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

    public abstract function getMethod(): string;

    public abstract function getPath(): string;
}
