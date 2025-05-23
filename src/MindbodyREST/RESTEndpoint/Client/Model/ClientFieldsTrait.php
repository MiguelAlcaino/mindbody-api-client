<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;

trait ClientFieldsTrait
{
    #[SerializedName('SendPromotionalEmails')]
    #[SkipWhenEmpty]
    private ?bool $sendPromotionalEmail = null;

    #[SerializedName('Active')]
    private bool $active;

    #[SerializedName('BirthDate')]
    #[SkipWhenEmpty]
    private ?string $birthDate = null;

    #[SerializedName('FirstName')]
    private string $firstName;

    #[SerializedName('LastName')]
    private string $lastName;

    #[SerializedName('State')]
    #[SkipWhenEmpty]
    private ?string $state = null;

    #[SerializedName('Email')]
    private string $email;

    #[SerializedName('MobilePhone')]
    #[SkipWhenEmpty]
    private ?string $mobilePhone = null;

    #[SerializedName('AddressLine1')]
    #[SkipWhenEmpty]
    private ?string $addressLine1 = null;

    #[SerializedName('AddressLine2')]
    #[SkipWhenEmpty]
    private ?string $addressLine2 = null;

    #[SerializedName('Country')]
    #[SkipWhenEmpty]
    private ?string $country = null;

    #[SerializedName('City')]
    #[SkipWhenEmpty]
    private ?string $city = null;

    #[SerializedName('ReferredBy')]
    #[SkipWhenEmpty]
    private ?string $referredBy;

    #[SerializedName('EmergencyContactInfoName')]
    #[SkipWhenEmpty]
    private ?string $emergencyContactInfoName = null;

    #[SerializedName('EmergencyContactInfoEmail')]
    #[SkipWhenEmpty]
    private ?string $emergencyContactInfoEmail = null;

    #[SerializedName('EmergencyContactInfoPhone')]
    #[SkipWhenEmpty]
    private ?string $emergencyContactInfoPhone = null;

    #[SerializedName('EmergencyContactInfoRelationship')]
    #[SkipWhenEmpty]
    private ?string $emergencyContactInfoRelationship = null;

    #[SerializedName('Gender')]
    #[SkipWhenEmpty]
    private ?string $gender = null;

    #[SerializedName('PostalCode')]
    #[SkipWhenEmpty]
    private ?string $postalCode = null;

    public function isSendPromotionalEmail(): bool
    {
        return $this->sendPromotionalEmail ?? false;
    }

    public function setSendPromotionalEmail(?bool $sendPromotionalEmail): static
    {
        $this->sendPromotionalEmail = $sendPromotionalEmail;

        return $this;
    }

    public function getBirthDate(): ?DateTimeImmutable
    {
        if ($this->birthDate === null) {
            return null;
        }

        return new DateTimeImmutable($this->birthDate);
    }

    public function setBirthDate(?DateTimeImmutable $birthDate): static
    {
        $this->birthDate = $birthDate?->format('Y-m-d\TH:i:s');

        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(string $mobilePhone): static
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(?string $addressLine1): static
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function setAddressLine2(?string $addressLine2): static
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getReferredBy(): ?string
    {
        return $this->referredBy;
    }

    public function setReferredBy(?string $referredBy): static
    {
        $this->referredBy = $referredBy;

        return $this;
    }

    public function getEmergencyContactInfoName(): ?string
    {
        return $this->emergencyContactInfoName;
    }

    public function setEmergencyContactInfoName(?string $emergencyContactInfoName): static
    {
        $this->emergencyContactInfoName = $emergencyContactInfoName;

        return $this;
    }

    public function getEmergencyContactInfoEmail(): ?string
    {
        return $this->emergencyContactInfoEmail;
    }

    public function setEmergencyContactInfoEmail(?string $emergencyContactInfoEmail): static
    {
        $this->emergencyContactInfoEmail = $emergencyContactInfoEmail;

        return $this;
    }

    public function getEmergencyContactInfoPhone(): ?string
    {
        return $this->emergencyContactInfoPhone;
    }

    public function setEmergencyContactInfoPhone(?string $emergencyContactInfoPhone): static
    {
        $this->emergencyContactInfoPhone = $emergencyContactInfoPhone;

        return $this;
    }

    public function getEmergencyContactInfoRelationship(): ?string
    {
        return $this->emergencyContactInfoRelationship;
    }

    public function setEmergencyContactInfoRelationship(?string $emergencyContactInfoRelationship): static
    {
        $this->emergencyContactInfoRelationship = $emergencyContactInfoRelationship;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }
}
