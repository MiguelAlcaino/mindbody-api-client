<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractSOAPMethod;

class AddOrUpdateClientsRequest extends AbstractSOAPMethod
{
    public const SOAP_METHOD_NAME = 'AddOrUpdateClients';

}
