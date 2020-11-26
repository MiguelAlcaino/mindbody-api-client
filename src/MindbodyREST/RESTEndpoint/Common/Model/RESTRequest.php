<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model;

use JMS\Serializer\Annotation as Serializer;

abstract class RESTRequest
{
    /**
     * @var bool
     * @Serializer\SerializedName("Test")
     */
    private bool $test = false;

    public abstract function getMethod(): string;

    public abstract function getPath(): string;
}
