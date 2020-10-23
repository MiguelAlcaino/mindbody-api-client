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

    public function setTest(bool $test): void
    {
        $this->test = $test;
    }
}
