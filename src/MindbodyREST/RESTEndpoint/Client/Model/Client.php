<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class Client extends BasicClient
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
     * @Serializer\SerializedName("email")
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

    public function getBirthDate(): DateTimeImmutable
    {
        return $this->birthDate;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getMobilePhone(): string
    {
        return $this->mobilePhone;
    }

    public function getAddressLine1(): string
    {
        return $this->addressLine1;
    }

    public function getAddressLine2(): string
    {
        return $this->addressLine2;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getReferredBy(): string
    {
        return $this->referredBy;
    }

    public function getEmergencyContactInfoName(): string
    {
        return $this->emergencyContactInfoName;
    }

    public function getEmergencyContactInfoEmail(): string
    {
        return $this->emergencyContactInfoEmail;
    }

    public function getEmergencyContactInfoPhone(): string
    {
        return $this->emergencyContactInfoPhone;
    }

    public function getEmergencyContactInfoRelationship(): string
    {
        return $this->emergencyContactInfoRelationship;
    }

    public function getGender(): string
    {
        return $this->gender;
    }
}
