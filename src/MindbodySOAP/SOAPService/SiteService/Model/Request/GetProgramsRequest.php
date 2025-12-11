<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractSOAPMethod;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestContainer;

class GetProgramsRequest extends AbstractSOAPMethod
{
    #[Serializer\SerializedName('GetPrograms')]
    protected RequestContainer $soapMethodName;
}
