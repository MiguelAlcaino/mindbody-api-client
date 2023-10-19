<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

trait ClientFieldsTrait
{
    #[SerializedName('SendPromotionalEmails')]
    private bool $sendPromotionalEmail;

    #[SerializedName('BirthDate')]
    #[Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")]
    private DateTimeImmutable $birthDate;

    #[SerializedName('FirstName')]
    private string $firstName;

    #[SerializedName('LastName')]
    private string $lastName;

    #[SerializedName('State')]
    private ?string $state;

    #[SerializedName('Email')]
    private string $email;

    #[SerializedName('MobilePhone')]
    private string $mobilePhone;

    #[SerializedName('AddressLine1')]
    private string $addressLine1;

    #[SerializedName('AddressLine2')]
    private ?string $addressLine2;

    #[SerializedName('Country')]
    private ?string $country;

    #[SerializedName('City')]
    private string $city;

    #[SerializedName('ReferredBy')]
    private ?string $referredBy;

    #[SerializedName('EmergencyContactInfoName')]
    private string $emergencyContactInfoName;

    #[SerializedName('EmergencyContactInfoEmail')]
    private ?string $emergencyContactInfoEmail;

    #[SerializedName('EmergencyContactInfoPhone')]
    private string $emergencyContactInfoPhone;

    #[SerializedName('EmergencyContactInfoRelationship')]
    private ?string $emergencyContactInfoRelationship;

    #[SerializedName('Gender')]
    private string $gender;

    #[SerializedName('PostalCode')]
    private string $postalCode;

    public function isSendPromotionalEmail(): bool
    {
        return $this->sendPromotionalEmail;
    }

    public function setSendPromotionalEmail(bool $sendPromotionalEmail): static
    {
        $this->sendPromotionalEmail = $sendPromotionalEmail;

        return $this;
    }

    public function getBirthDate(): DateTimeImmutable
    {
        return $this->birthDate;
    }

    public function setBirthDate(DateTimeImmutable $birthDate): static
    {
        $this->birthDate = $birthDate;

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

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(?string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMobilePhone(): string
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(string $mobilePhone): static
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    public function getAddressLine1(): string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(string $addressLine1): static
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

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getReferredBy(): string
    {
        return $this->referredBy;
    }

    public function setReferredBy(?string $referredBy): static
    {
        $this->referredBy = $referredBy;

        return $this;
    }

    public function getEmergencyContactInfoName(): string
    {
        return $this->emergencyContactInfoName;
    }

    public function setEmergencyContactInfoName(string $emergencyContactInfoName): static
    {
        $this->emergencyContactInfoName = $emergencyContactInfoName;

        return $this;
    }

    public function getEmergencyContactInfoEmail(): string
    {
        return $this->emergencyContactInfoEmail;
    }

    public function setEmergencyContactInfoEmail(?string $emergencyContactInfoEmail): static
    {
        $this->emergencyContactInfoEmail = $emergencyContactInfoEmail;

        return $this;
    }

    public function getEmergencyContactInfoPhone(): string
    {
        return $this->emergencyContactInfoPhone;
    }

    public function setEmergencyContactInfoPhone(string $emergencyContactInfoPhone): static
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

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
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

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }
}
