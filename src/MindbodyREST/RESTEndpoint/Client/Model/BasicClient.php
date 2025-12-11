<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Model;

use JMS\Serializer\Annotation as Serializer;

class BasicClient
{
    #[Serializer\SerializedName('Id')]
    protected int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }
}
