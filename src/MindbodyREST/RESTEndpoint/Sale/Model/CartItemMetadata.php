<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model;

use JMS\Serializer\Annotation as Serializer;

class CartItemMetadata
{
    #[Serializer\SerializedName('Id')]
    private int $id;

    #[Serializer\SerializedName('Name')]
    #[Serializer\SkipWhenEmpty]
    private ?string $name = null;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
