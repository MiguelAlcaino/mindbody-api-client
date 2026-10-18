<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class Sale
{
    #[Serializer\SerializedName('Id')]
    private int $id;
    #[Serializer\SerializedName('SaleDateTime')]
    private string $saleDatetime;
    #[Serializer\SerializedName('ClientId')]
    private string $clientId;
    /**
     * @var array<PurchasedItem>
     */
    #[Serializer\SerializedName('PurchasedItems')]
    #[Serializer\Type('array<' . PurchasedItem::class . '>')]
    private array $purchasedItems;
    #[Serializer\SerializedName('LocationId')]
    private ?int $locationId = null;
    /**
     * @var array<SalePayment>|null
     */
    #[Serializer\SerializedName('Payments')]
    #[Serializer\Type('array<' . SalePayment::class . '>')]
    private ?array $payments = null;

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

    public function getLocationId(): ?int
    {
        return $this->locationId;
    }

    /**
     * Empty when Mindbody does not send the Payments key.
     *
     * @return SalePayment[]
     */
    public function getPayments(): array
    {
        return $this->payments ?? [];
    }
}
