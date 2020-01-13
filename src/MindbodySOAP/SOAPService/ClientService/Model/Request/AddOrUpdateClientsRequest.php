<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractSOAPMethod;

/**
 * @Serializer\ExclusionPolicy(policy="all")
 */
class AddOrUpdateClientsRequest extends AbstractSOAPMethod
{
    public const SOAP_METHOD_NAME = 'AddOrUpdateClients';

}
