<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Model;

use JMS\Serializer\Annotation as Serializer;

class PaymentType
{
    #[Serializer\SerializedName("Id")]
    private int $id;

    #[Serializer\SerializedName("PaymentTypeName")]
    private string $paymentTypeName;

    #[Serializer\SerializedName("Active")]
    private bool $active;

    #[Serializer\SerializedName("Fee")]
    private ?float $fee;

    public function getId(): int
    {
        return $this->id;
    }

    public function getPaymentTypeName(): string
    {
        return $this->paymentTypeName;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getFee(): ?float
    {
        return $this->fee;
    }
}
