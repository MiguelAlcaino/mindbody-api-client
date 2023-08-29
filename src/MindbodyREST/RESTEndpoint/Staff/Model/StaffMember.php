<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Staff\Model;

use JMS\Serializer\Annotation as Serializer;

class StaffMember
{
    #[Serializer\SerializedName("Id")]
    private int $id;

    #[Serializer\SerializedName("FirstName")]
    private string $firstName;

    #[Serializer\SerializedName("LastName")]
    private string $lastName;

    #[Serializer\SerializedName("Email")]
    #[Serializer\SkipWhenEmpty]
    private ?string $email = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
}
