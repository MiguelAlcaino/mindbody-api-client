<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

abstract class AbstractParamsRequest implements RequestParamsInterface
{
    /**
     * @var bool
     * @Serializer\SerializedName("Test")
     * @Serializer\Type("bool")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $test;

    /** @var array */
    private $headers = [];

    public function setTest(bool $test): void
    {
        $this->test = $test;
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
}
