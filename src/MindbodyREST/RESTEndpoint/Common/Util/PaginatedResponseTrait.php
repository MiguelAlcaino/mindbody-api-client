<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\PaginationResponse;

trait PaginatedResponseTrait
{
    #[Serializer\SerializedName("PaginationResponse")]
    private PaginationResponse $paginationResponse;

    public function getPaginationResponse(): PaginationResponse
    {
        return $this->paginationResponse;
    }
}
