<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

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
     * @var int
     * @Serializer\SerializedName("PageSize")
     * @Serializer\XmlElement(cdata=false)
     */
    private $pageSize;

    /**
     * @var int
     * @Serializer\SerializedName("CurrentPageIndex")
     * @Serializer\XmlElement(cdata=true)
     */
    private $currentPageIndex;

    public function __construct(string $searchText = '')
    {
        $this->searchText = $searchText;
    }

    public function setPageSize(int $pageSize): GetClientsParamsRequest
    {
        $this->pageSize = $pageSize;

        return $this;
    }

    public function setCurrentPageIndex(int $currentPageIndex): GetClientsParamsRequest
    {
        $this->currentPageIndex = $currentPageIndex;

        return $this;
    }
}
