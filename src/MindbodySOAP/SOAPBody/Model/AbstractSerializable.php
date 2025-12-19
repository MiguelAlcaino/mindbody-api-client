<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Model;

use JMS\Serializer\Annotation as Serializer;

abstract class AbstractSerializable
{
    #[Serializer\Exclude]
    private string $payload;

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function setPayload(string $payload): self
    {
        $this->payload = $payload;

        return $this;
    }
}
