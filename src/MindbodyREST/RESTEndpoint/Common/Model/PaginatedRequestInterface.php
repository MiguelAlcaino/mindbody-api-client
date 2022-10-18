<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model;

interface PaginatedRequestInterface
{
    public function setLimit(int $limit): self;

    public function setOffset(int $offset): self;
}
