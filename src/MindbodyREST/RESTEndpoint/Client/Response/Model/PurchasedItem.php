<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class PurchasedItem
{
    #[Serializer\SerializedName('Id')]
    private int $id;

    #[Serializer\SerializedName('IsService')]
    private bool $isService;

    #[Serializer\SerializedName('ExpDate')]
    #[Serializer\SkipWhenEmpty]
    private ?string $expDate = null;

    #[Serializer\SerializedName('ActiveDate')]
    #[Serializer\SkipWhenEmpty]
    private ?string $activeDate = null;

    #[Serializer\SerializedName('SaleDetailId')]
    private ?int $saleDetailId = null;

    #[Serializer\SerializedName('Description')]
    private ?string $description = null;

    #[Serializer\SerializedName('TotalAmount')]
    private ?float $totalAmount = null;

    #[Serializer\SerializedName('Returned')]
    private ?bool $returned = null;

    #[Serializer\SerializedName('Notes')]
    private ?string $notes = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function isService(): bool
    {
        return $this->isService;
    }

    public function getExpDate(): ?DateTimeImmutable
    {
        if (null === $this->expDate) {
            return null;
        }

        return new DateTimeImmutable($this->expDate);
    }

    /**
     * Mindbody sends this date in the site's local time without a timezone indicator, exactly
     * like ExpDate, so the returned value carries PHP's default timezone.
     */
    public function getActiveDate(): ?DateTimeImmutable
    {
        if (null === $this->activeDate) {
            return null;
        }

        return new DateTimeImmutable($this->activeDate);
    }

    public function getSaleDetailId(): ?int
    {
        return $this->saleDetailId;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getTotalAmount(): ?float
    {
        return $this->totalAmount;
    }

    public function isReturned(): ?bool
    {
        return $this->returned;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }
}
