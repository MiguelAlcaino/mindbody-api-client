<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model;

use JMS\Serializer\Annotation as Serializer;

class CartItem
{
    /**
     * @Serializer\SerializedName("Item")
     */
    private Item $item;

    /**
     * @Serializer\SerializedName("Quantity")
     */
    private int $quantity;

    public function __construct(Item $item, int $quantity)
    {
        $this->item     = $item;
        $this->quantity = $quantity;
    }

}
