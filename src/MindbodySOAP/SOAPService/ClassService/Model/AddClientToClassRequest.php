<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClassService\Model;

use JsonSerializable;

class AddClientToClassRequest implements JsonSerializable
{
    private string $ClientID;

    private int $ClassID;

    public function __construct(string $ClientID, int $ClassID)
    {
        $this->ClientID = $ClientID;
        $this->ClassID  = $ClassID;
    }

    /**
     * @return array{ClientID: string, ClassID: int}
     */
    public function jsonSerialize(): array
    {
        return [
            'ClientID' => $this->ClientID,
            'ClassID'  => $this->ClassID,
        ];
    }

    public function getClientID(): string
    {
        return $this->ClientID;
    }

    public function getClassID(): int
    {
        return $this->ClassID;
    }
}
