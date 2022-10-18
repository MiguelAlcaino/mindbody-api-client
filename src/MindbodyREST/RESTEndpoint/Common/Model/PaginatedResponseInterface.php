<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model;

interface PaginatedResponseInterface
{
    public function getPaginationResponse(): PaginationResponse;
}
