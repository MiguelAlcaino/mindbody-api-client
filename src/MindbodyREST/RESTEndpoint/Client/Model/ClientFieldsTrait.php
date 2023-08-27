<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Model;

use DateTimeImmutable;

trait ClientFieldsTrait
{
    /**
     * @Serializer\SerializedName("SendPromotionalEmails")
     * @Serializer\Type("bool")
     */
    private bool $sendPromotionalEmail;

    /**
     * @Serializer\SerializedName("BirthDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     */
    private DateTimeImmutable $birthDate;

    /**
     * @Serializer\SerializedName("FirstName")
     * @Serializer\Type("string")
     */
    private string $firstName;

    /**
     * @Serializer\SerializedName("LastName")
     * @Serializer\Type("string")
     */
    private string $lastName;

    /**
     * @Serializer\SerializedName("State")
     * @Serializer\Type("string")
     */
    private ?string $state;

    /**
     * @Serializer\SerializedName("Email")
     * @Serializer\Type("string")
     */
    private string $email;

    /**
     * @Serializer\SerializedName("MobilePhone")
     * @Serializer\Type("string")
     */
    private string $mobilePhone;

    /**
     * @Serializer\SerializedName("AddressLine1")
     * @Serializer\Type("string")
     */
    private string $addressLine1;

    /**
     * @Serializer\SerializedName("AddressLine2")
     * @Serializer\Type("string")
     */
    private ?string $addressLine2;

    /**
     * @Serializer\SerializedName("Country")
     */
    private ?string $country;

    /**
     * @Serializer\SerializedName("City")
     * @Serializer\Type("string")
     */
    private string $city;

    /**
     * @Serializer\SerializedName("ReferredBy")
     * @Serializer\Type("string")
     */
    private ?string $referredBy;

    /**
     * @Serializer\SerializedName("EmergencyContactInfoName")
     * @Serializer\Type("string")
     */
    private string $emergencyContactInfoName;

    /**
     * @Serializer\SerializedName("EmergencyContactInfoEmail")
     * @Serializer\Type("string")
     */
    private ?string $emergencyContactInfoEmail;

    /**
     * @Serializer\SerializedName("EmergencyContactInfoPhone")
     * @Serializer\Type("string")
     */
    private string $emergencyContactInfoPhone;

    /**
     * @Serializer\SerializedName("EmergencyContactInfoRelationship")
     * @Serializer\Type("string")
     */
    private ?string $emergencyContactInfoRelationship;

    /**
     * @Serializer\SerializedName("Gender")
     * @Serializer\Type("string")
     */
    private string $gender;

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

    public function getEmergencyContactInfoRelationship(): string
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
}
