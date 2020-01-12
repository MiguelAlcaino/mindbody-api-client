<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAPRequest\SOAPService\ClientService\Model;

use JsonSerializable;

class Client implements JsonSerializable
{
    /** @var string */
    private $ID;

    /** @var bool */
    private $PromotionalEmailOptIn;

    public function __construct(string $ID)
    {
        $this->ID = $ID;
    }

    public function jsonSerialize()
    {
        $jsonArray = [
            'ID' => $this->ID,
        ];

        if (null !== $this->PromotionalEmailOptIn) {
            $jsonArray['PromotionalEmailOptIn'] = $this->PromotionalEmailOptIn ? 'true' : 'false';
        }
    }

    public function getID(): string
    {
        return $this->ID;
    }

    public function isPromotionalEmailOptIn(): bool
    {
        return $this->PromotionalEmailOptIn;
    }

    /**
     * @param bool $PromotionalEmailOptIn
     *
     * @return Client
     */
    public function setPromotionalEmailOptIn(bool $PromotionalEmailOptIn): Client
    {
        $this->PromotionalEmailOptIn = $PromotionalEmailOptIn;

        return $this;
    }
}
