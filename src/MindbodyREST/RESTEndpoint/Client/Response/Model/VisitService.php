<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Model\Program;

class VisitService
{
    #[Serializer\SerializedName('ActiveDate')]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")]
    private DateTimeImmutable $activeDate;

    #[Serializer\SerializedName('Count')]
    private int $count;

    #[Serializer\SerializedName('Current')]
    private bool $current;

    #[Serializer\SerializedName('ExpirationDate')]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")]
    private DateTimeImmutable $expirationDate;

    #[Serializer\SerializedName('Id')]
    private int $id;

    #[Serializer\SerializedName('ProductId')]
    private int $productId;

    #[Serializer\SerializedName('Name')]
    private string $name;

    #[Serializer\SerializedName('PaymentDate')]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")]
    private DateTimeImmutable $paymentDate;

    #[Serializer\SerializedName('Program')]
    private Program $program;

    #[Serializer\SerializedName('Remaining')]
    private int $remaining;

    #[Serializer\SerializedName('SiteId')]
    private int $siteId;

    #[Serializer\SerializedName('Action')]
    private string $action;

    #[Serializer\SerializedName('ClientID')]
    private string $clientId;

    #[Serializer\SerializedName('Returned')]
    private bool $returned;

    public function getActiveDate(): DateTimeImmutable
    {
        return $this->activeDate;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function isCurrent(): bool
    {
        return $this->current;
    }

    public function getExpirationDate(): DateTimeImmutable
    {
        return $this->expirationDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPaymentDate(): DateTimeImmutable
    {
        return $this->paymentDate;
    }

    public function getProgram(): Program
    {
        return $this->program;
    }

    public function getRemaining(): int
    {
        return $this->remaining;
    }

    public function getSiteId(): int
    {
        return $this->siteId;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function isReturned(): bool
    {
        return $this->returned;
    }
}
