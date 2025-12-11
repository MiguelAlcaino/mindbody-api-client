<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Model;

use JMS\Serializer\Annotation as Serializer;

trait MindbodyPaginatedResultTrait
{
    #[Serializer\Type("int")]
    #[Serializer\SerializedName("ResultCount")]
    #[Serializer\XmlElement(cdata: false)]
    private $resultCount;

    #[Serializer\Type("int")]
    #[Serializer\SerializedName("TotalPageCount")]
    #[Serializer\XmlElement(cdata: false)]
    private int $totalPageCount;

    #[Serializer\Type("int")]
    #[Serializer\SerializedName("CurrentPageIndex")]
    #[Serializer\XmlElement(cdata: false)]
    private int $currentPageIndex;

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
