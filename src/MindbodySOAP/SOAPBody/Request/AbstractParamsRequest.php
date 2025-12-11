<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

abstract class AbstractParamsRequest implements RequestParamsInterface
{
    #[Serializer\SerializedName("Test")]
    #[Serializer\Type("bool")]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\SkipWhenEmpty]
    private bool $test;

    #[Serializer\Exclude]
    private array $headers = [];

    public function setTest(bool $test): void
    {
        $this->test = $test;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array<string, int|string> $headers
     */
    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }
}
