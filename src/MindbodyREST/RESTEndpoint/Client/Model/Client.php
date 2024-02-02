<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Model;

use JMS\Serializer\Annotation as Serializer;

class Client extends BasicClient
{
    /**
     * @Serializer\SerializedName("Email")
     */
    private string $email;
    /**
     * @Serializer\SerializedName("Active")
     */
    private bool $active;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Client
    {
        $this->email = $email;

        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): Client
    {
        $this->active = $active;

        return $this;
    }
}
