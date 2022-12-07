<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class Sale
{
    /**
     * @Serializer\SerializedName("Id")
     */
    private int $id;
    /**
     * @Serializer\SerializedName("SaleDateTime")
     */
    private string $saleDatetime;
    /**
     * @Serializer\SerializedName("ClientId")
     */
    private string $clientId;
    /**
     * @var PurchasedItem[]
     * @Serializer\SerializedName("PurchasedItems")
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model\PurchasedItem>")
     */
    private array $purchasedItems;

    public function getId(): int
    {
        return $this->id;
    }

    public function getSaleDatetime(): DateTimeImmutable
    {
        return new DateTimeImmutable($this->saleDatetime);
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @return PurchasedItem[]
     */
    public function getPurchasedItems(): array
    {
        return $this->purchasedItems;
    }
}