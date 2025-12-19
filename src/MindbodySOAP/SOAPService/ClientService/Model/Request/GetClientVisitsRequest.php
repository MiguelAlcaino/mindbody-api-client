<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractSOAPMethod;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestContainer;

class GetClientVisitsRequest extends AbstractSOAPMethod
{
    #[Serializer\SerializedName('GetClientVisits')]
    protected RequestContainer $soapMethodName;
}
