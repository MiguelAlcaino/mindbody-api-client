<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Model\MindbodyPaginatedRequestTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestParamsInterface;

class GetClientsParamsRequest implements RequestParamsInterface
{
    use MindbodyPaginatedRequestTrait;

    /**
     * @var string
     * @Serializer\SerializedName("SearchText")
     * @Serializer\XmlElement(cdata=false)
     */
    private $searchText;

    /**
     * @var DateTimeImmutable|null
     * @Serializer\SerializedName("LastModifiedDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     * @Serializer\XmlElement(cdata=false)
     */
    private $lastModifiedDate;

    public function __construct(string $searchText = '')
    {
        $this->searchText = $searchText;
    }

    public function setLastModifiedDate(?DateTimeImmutable $lastModifiedDate): GetClientsParamsRequest
    {
        $this->lastModifiedDate = $lastModifiedDate;

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
