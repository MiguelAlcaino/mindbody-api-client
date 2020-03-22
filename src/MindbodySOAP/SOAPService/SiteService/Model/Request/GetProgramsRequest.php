<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Request;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractSOAPMethod;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestContainer;
use JMS\Serializer\Annotation as Serializer;

class GetProgramsRequest extends AbstractSOAPMethod
{
    /**
     * @var RequestContainer
     * @Serializer\SerializedName("GetPrograms")
     */
    protected $soapMethodName;
}