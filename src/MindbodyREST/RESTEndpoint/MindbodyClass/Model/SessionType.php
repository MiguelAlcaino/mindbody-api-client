<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model;

use JMS\Serializer\Annotation as Serializer;

class SessionType
{
    #[Serializer\SerializedName("Id")]
    private int $id;

    #[Serializer\SerializedName("Name")]
    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
