<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model;

use JMS\Serializer\Annotation as Serializer;

class Program
{
    #[Serializer\SerializedName("Id")]
    private int $id;

    #[Serializer\SerializedName("CancelOffset")]
    private ?int $cancelOffset;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCancelOffset(): ?int
    {
        return $this->cancelOffset;
    }
}
