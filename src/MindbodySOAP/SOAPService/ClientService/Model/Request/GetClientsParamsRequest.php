<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Model\MindbodyPaginatedRequestTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractParamsRequest;

class GetClientsParamsRequest extends AbstractParamsRequest
{
    use MindbodyPaginatedRequestTrait;

    #[Serializer\SerializedName("SearchText")]
    #[Serializer\XmlElement(cdata: false)]
    private $searchText;

    #[Serializer\SerializedName("LastModifiedDate")]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")]
    #[Serializer\XmlElement(cdata: false)]
    private DateTimeImmutable|null $lastModifiedDate;

    #[Serializer\SerializedName("ClientIDs")]
    #[Serializer\XmlList(entry: "string")]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\SkipWhenEmpty]
    private array $clientIds;

    public function __construct(string $searchText = '')
    {
        $this->searchText = $searchText;
    }

    public function setLastModifiedDate(?DateTimeImmutable $lastModifiedDate): GetClientsParamsRequest
    {
        $this->lastModifiedDate = $lastModifiedDate;

        return $this;
    }

    public function getClientIds(): array
    {
        return $this->clientIds;
    }

    /**
     * @param string[] $clientIds
     */
    public function setClientIds(array $clientIds): self
    {
        $this->clientIds = $clientIds;

        return $this;
    }

    public function getSearchText(): string
    {
        return $this->searchText;
    }

    public function getLastModifiedDate(): ?DateTimeImmutable
    {
        return $this->lastModifiedDate;
    }
}
