<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client;

class AddOrUpdateClientsParamsRequest extends AbstractParamsRequest
{
    /**
     * @var Client[]
     */
    #[Serializer\SerializedName("Clients")]
    #[Serializer\XmlList(entry: "Client")]
    private array $clients;

    /**
     * @param Client[] $clients
     */
    public function __construct(array $clients)
    {
        $this->clients = $clients;
    }

    public function getClients(): array
    {
        return $this->clients;
    }
}
