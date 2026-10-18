<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * A payment applied to a sale, as returned inside Sale.Payments by client/clientpurchases.
 * Mindbody omits keys it has no value for, so every property is optional.
 */
class SalePayment
{
    #[Serializer\SerializedName('Id')]
    private ?int $id = null;

    #[Serializer\SerializedName('Amount')]
    private ?float $amount = null;

    #[Serializer\SerializedName('Method')]
    private ?int $method = null;

    #[Serializer\SerializedName('Type')]
    private ?string $type = null;

    #[Serializer\SerializedName('Notes')]
    private ?string $notes = null;

    #[Serializer\SerializedName('TransactionId')]
    private ?int $transactionId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function getMethod(): ?int
    {
        return $this->method;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function getTransactionId(): ?int
    {
        return $this->transactionId;
    }
}
