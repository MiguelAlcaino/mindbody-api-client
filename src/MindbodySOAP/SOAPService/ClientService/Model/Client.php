<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model;

use JsonSerializable;

class Client implements JsonSerializable
{
    /** @var string */
    private $ID;

    /** @var bool */
    private $PromotionalEmailOptIn;

    /** @var string */
    private $FirstName;

    /** @var string */
    private $LastName;

    /** @var string */
    private $Email;

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

        return $jsonArray;
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

    public function getFirstName(): string
    {
        return $this->FirstName;
    }

    /**
     * @param string $FirstName
     *
     * @return Client
     */
    public function setFirstName(string $FirstName): Client
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->LastName;
    }

    /**
     * @param string $LastName
     *
     * @return Client
     */
    public function setLastName(string $LastName): Client
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->Email;
    }

    /**
     * @param string $Email
     *
     * @return Client
     */
    public function setEmail(string $Email): Client
    {
        $this->Email = $Email;

        return $this;
    }
}
