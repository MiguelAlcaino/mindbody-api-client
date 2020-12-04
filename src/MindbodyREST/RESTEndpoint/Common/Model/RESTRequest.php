<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model;

use JMS\Serializer\Annotation as Serializer;

abstract class RESTRequest
{
    /**
     * @Serializer\SerializedName("Test")
     */
    private bool $test = false;

    public function setTest(bool $test): self
    {
        $this->test = $test;

        return $this;
    }

    public abstract function getMethod(): string;

    public abstract function getPath(): string;
}
