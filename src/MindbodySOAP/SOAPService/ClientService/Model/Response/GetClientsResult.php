<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client;

class GetClientsResult extends AbstractBaseResultResponse
{
    /**
     * @var Client[]
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client>")
     * @Serializer\XmlList(entry="Client")
     * @Serializer\SerializedName("Clients")
     */
    private $clients;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ResultCount")
     * @Serializer\XmlElement(cdata=false)
     */
    private $resultCount;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("TotalPageCount")
     * @Serializer\XmlElement(cdata=false)
     */
    private $totalPageCount;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("CurrentPageIndex")
     * @Serializer\XmlElement(cdata=false)
     */
    private $currentPageIndex;

    public function getMethodName(): string
    {
        return 'GetClients';
    }

    /**
     * @return Client[]
     */
    public function getClients(): array
    {
        return $this->clients;
    }

    public function getResultCount(): int
    {
        return $this->resultCount;
    }

    public function getTotalPageCount(): int
    {
        return $this->totalPageCount;
    }

    public function getCurrentPageIndex(): int
    {
        return $this->currentPageIndex;
    }
}
