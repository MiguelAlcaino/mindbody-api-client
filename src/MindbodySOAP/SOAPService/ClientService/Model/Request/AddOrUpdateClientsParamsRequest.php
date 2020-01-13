<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestParamsInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client;

class AddOrUpdateClientsParamsRequest implements RequestParamsInterface
{
    /**
     * @var Client[]
     * @Serializer\SerializedName("Clients")
     * @Serializer\XmlList(entry="Client")
     */
    private $clients;

    public function __construct(array $clients)
    {
        $this->clients = $clients;
    }

}
