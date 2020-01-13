<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

abstract class AbstractSOAPMethod
{
    /**
     * @var RequestContainer
     * @Serializer\Exclude()
     */
    protected $soapMethodName;

    public function __construct($request)
    {
        $this->soapMethodName = new RequestContainer($request);
    }
}
