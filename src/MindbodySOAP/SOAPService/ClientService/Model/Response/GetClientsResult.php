<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\SOAPMethodResultInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client;

class GetClientsResult extends AbstractBaseResultResponse implements SOAPMethodResultInterface
{
    /**
     * @var Client[]
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client>")
     * @Serializer\XmlList(entry="Client")
     * @Serializer\SerializedName("Clients")
     */
    private $clients;

    public function getMethodName(): string
    {
        return 'GetClients';
    }

    public function getClients(): array
    {
        return $this->clients;
    }
}
