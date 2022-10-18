<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util;

trait PaginatedRequestTrait
{
    private int $limit;
    private int $offset;

    public function setLimit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function setOffSet(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }
}
