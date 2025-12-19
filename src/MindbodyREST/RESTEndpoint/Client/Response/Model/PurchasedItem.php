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
}
