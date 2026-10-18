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

    /**
     * Freeform notes stored on the sale item (Mindbody accepts up to 255 characters).
     */
    #[Serializer\SerializedName('SalesNotes')]
    #[Serializer\SkipWhenEmpty]
    private ?string $salesNotes = null;

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

    public function getSalesNotes(): ?string
    {
        return $this->salesNotes;
    }

    public function setSalesNotes(?string $salesNotes): self
    {
        $this->salesNotes = $salesNotes;

        return $this;
    }
}
