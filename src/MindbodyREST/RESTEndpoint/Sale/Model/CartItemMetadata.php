<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model;


use JMS\Serializer\Annotation as Serializer;

class CartItemMetadata
{
    /**
     * @Serializer\SerializedName("Id")
     */
    private int $id;

    /**
     * @Serializer\SerializedName("Name")
     * @Serializer\SkipWhenEmpty
     */
    private ?string $name;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->name = null;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

}
