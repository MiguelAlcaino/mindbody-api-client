<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlNamespace("http://clients.mindbodyonline.com/api/0_5_1")
 * @Serializer\ExclusionPolicy(policy="all")
 */
abstract class AbstractSOAPMethod
{
    /**
     * @var Request
     * @Serializer\SerializedName("Request")
     * @Serializer\Expose()
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getSoapMethodName(): string
    {
        return static::SOAP_METHOD_NAME;
    }
}
