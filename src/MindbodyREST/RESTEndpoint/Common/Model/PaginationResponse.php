<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model;

use JMS\Serializer\Annotation as Serializer;

class PaginationResponse
{
    #[Serializer\SerializedName("RequestedLimit")]
    private int $requestedLimit;

    #[Serializer\SerializedName("RequestedOffset")]
    private int $requestedOffset;

    #[Serializer\SerializedName("PageSize")]
    private int $pageSize;

    #[Serializer\SerializedName("TotalResults")]
    private int $totalResults;

    public function getRequestedLimit(): int
    {
        return $this->requestedLimit;
    }

    public function getRequestedOffset(): int
    {
        return $this->requestedOffset;
    }

    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    public function getTotalResults(): int
    {
        return $this->totalResults;
    }
}
