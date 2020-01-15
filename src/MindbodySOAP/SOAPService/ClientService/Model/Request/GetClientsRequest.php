<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractSOAPMethod;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestContainer;

class GetClientsRequest extends AbstractSOAPMethod
{
    public const SOAP_METHOD = 'GetClients';

    /**
     * @var RequestContainer
     * @Serializer\SerializedName("GetClients")
     */
    protected $soapMethodName;
}
