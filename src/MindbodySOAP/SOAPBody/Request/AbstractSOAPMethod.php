<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

abstract class AbstractSOAPMethod
{
    /**
     * @var Request
     * @Serializer\SerializedName("Request")
     */
    private $request;

    public function getSoapMethodName(): string
    {
        return static::SOAP_METHOD_NAME;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     *
     * @return AbstractSOAPMethod
     */
    public function setRequest(Request $request): AbstractSOAPMethod
    {
        $this->request = $request;

        return $this;
    }
}
