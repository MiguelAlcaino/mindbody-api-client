<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model;

use JMS\Serializer\Annotation as Serializer;

class Item
{
    /**
     * @Serializer\SerializedName("Type")
     */
    private string $type;

    /**
     * @Serializer\SerializedName("Metadata")
     */
    private CartItemMetadata $metadata;

    public function __construct(ItemTypeEnum $type, CartItemMetadata $metadata)
    {
        $this->type     = $type->value;
        $this->metadata = $metadata;
    }

}
