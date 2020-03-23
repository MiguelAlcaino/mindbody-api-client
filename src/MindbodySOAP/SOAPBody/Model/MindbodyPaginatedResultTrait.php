<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Model;

use JMS\Serializer\Annotation as Serializer;

trait MindbodyPaginatedResultTrait
{
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