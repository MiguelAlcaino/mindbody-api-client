<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Model;

use JMS\Serializer\Annotation as Serializer;

trait MindbodyPaginatedRequestTrait
{
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

    public function setPageSize(?int $pageSize): self
    {
        $this->pageSize = $pageSize;

        return $this;
    }

    public function setCurrentPageIndex(?int $currentPageIndex): self
    {
        $this->currentPageIndex = $currentPageIndex;

        return $this;
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