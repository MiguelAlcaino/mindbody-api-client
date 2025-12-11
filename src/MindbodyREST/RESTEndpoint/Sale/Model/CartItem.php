<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model;

use JMS\Serializer\Annotation as Serializer;

class CartItem
{
    #[Serializer\SerializedName('Item')]
    private Item $item;

    #[Serializer\SerializedName('Quantity')]
    private int $quantity;

    /**
     * @var array<int>|null
     */
    #[Serializer\SerializedName('VisitIds')]
    #[Serializer\Type('array<int>')]
    #[Serializer\SkipWhenEmpty]
    private ?array $visitIds;

    #[Serializer\SerializedName('DiscountAmount')]
    #[Serializer\SkipWhenEmpty]
    private ?float $discountAmount;

    public function __construct(Item $item, int $quantity)
    {
        $this->item           = $item;
        $this->quantity       = $quantity;
        $this->visitIds       = null;
        $this->discountAmount = null;
    }

    /**
     * @param array<int> $visitIds
     */
    public function setVisitIds(array $visitIds): self
    {
        $this->visitIds = $visitIds;

        return $this;
    }

    public function setDiscountAmount(float $discountAmount): self
    {
        $this->discountAmount = $discountAmount;

        return $this;
    }
}
