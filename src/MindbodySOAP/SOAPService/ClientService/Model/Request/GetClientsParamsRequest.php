<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestParamsInterface;

class GetClientsParamsRequest implements RequestParamsInterface
{
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

    /**
     * @var int|null
     * @Serializer\SerializedName("PageSize")
     * @Serializer\XmlElement(cdata=false)
     */
    private $pageSize;

    /**
     * @var int|null
     * @Serializer\SerializedName("CurrentPageIndex")
     * @Serializer\XmlElement(cdata=true)
     */
    private $currentPageIndex;

    public function __construct(string $searchText = '')
    {
        $this->searchText = $searchText;
    }

    public function setPageSize(?int $pageSize): GetClientsParamsRequest
    {
        $this->pageSize = $pageSize;

        return $this;
    }

    public function setCurrentPageIndex(?int $currentPageIndex): GetClientsParamsRequest
    {
        $this->currentPageIndex = $currentPageIndex;

        return $this;
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

    public function getPageSize(): ?int
    {
        return $this->pageSize;
    }

    public function getCurrentPageIndex(): ?int
    {
        return $this->currentPageIndex;
    }
}
