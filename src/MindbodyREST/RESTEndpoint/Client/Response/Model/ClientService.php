<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class ClientService
{
    /**
     * @Serializer\SerializedName("Id")
     */
    private int $id;
    /**
     * @var DateTimeImmutable
     * @Serializer\SerializedName("ActiveDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     */
    private DateTimeImmutable $activeDate;
    /**
     * @var DateTimeImmutable
     * @Serializer\SerializedName("ExpirationDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     */
    private DateTimeImmutable $expirationDate;
    /**
     * @Serializer\SerializedName("Current")
     */
    private bool $current;
    /**
     * @Serializer\SerializedName("Name")
     */
    private string $name;
    /**
     * @Serializer\SerializedName("PaymentDate")
     */
    private string $paymentDate;
    /**
     * @Serializer\SerializedName("Count")
     */
    private int $count;
    /**
     * @Serializer\SerializedName("Remaining")
     */
    private int $remaining;
    /**
     * @Serializer\SerializedName("SiteId")
     */
    private int $siteId;
    /**
     * @Serializer\SerializedName("ProductId")
     */
    private int $productId;

    public function getActiveDate(): DateTimeImmutable
    {
        return $this->activeDate;
    }

    public function getExpirationDate(): DateTimeImmutable
    {
        return $this->expirationDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function isCurrent(): bool
    {
        return $this->current;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPaymentDate(): DateTimeImmutable
    {
        return new DateTimeImmutable($this->paymentDate);
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getRemaining(): int
    {
        return $this->remaining;
    }

    public function getSiteId(): int
    {
        return $this->siteId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }
}
