<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\HomeLocation;

class Client
{
    #[Serializer\SerializedName("ID")]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    #[Serializer\SkipWhenEmpty]
    private $id;

    /**
     * */
    #[Serializer\SerializedName("PromotionalEmailOptIn")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("bool")]
    private bool|null $promotionalEmailOptIn;

    #[Serializer\SerializedName("FirstName")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private $firstName;

    #[Serializer\SerializedName("LastName")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private string|null $lastName;

    #[Serializer\SerializedName("Email")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private $email;

    #[Serializer\SerializedName("AddressLine1")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private string|null $addressLine1;

    #[Serializer\SerializedName("AddressLine2")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private $addressLine2;

    #[Serializer\SerializedName("City")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private string|null $city;

    #[Serializer\SerializedName("State")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private $state;

    #[Serializer\SerializedName("PostalCode")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private string|null $postalCode;

    #[Serializer\SerializedName("Country")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private $country;

    #[Serializer\SerializedName("MobilePhone")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private string|null $mobilePhone;

    #[Serializer\SerializedName("HomePhone")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private $homePhone;

    #[Serializer\SerializedName("WorkPhone")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private string|null $workPhone;

    #[Serializer\SerializedName("BirthDate")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s','',['Y-m-d\TH:i:s.v','Y-m-d\TH:i:s']>")]
    private $birthday;

    #[Serializer\SerializedName("Gender")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private string|null $gender;

    #[Serializer\SerializedName("Password")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private $password;

    #[Serializer\SerializedName("Username")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private string|null $username;

    #[Serializer\SerializedName("ReferredBy")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private $referredBy;

    #[Serializer\SerializedName("EmergencyContactInfoName")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private string|null $emergencyContactInfoName;

    #[Serializer\SerializedName("EmergencyContactInfoRelationship")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private $emergencyContactInfoRelationship;

    #[Serializer\SerializedName("EmergencyContactInfoPhone")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private string|null $emergencyContactInfoPhone;

    #[Serializer\SerializedName("HomeLocation")]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\HomeLocation")]
    private HomeLocation|null $homeLocation;

    public function __construct(?string $id = null)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function clearId(): self
    {
        $this->id = null;

        return $this;
    }

    public function isPromotionalEmailOptIn(): ?bool
    {
        return $this->promotionalEmailOptIn;
    }

    public function setPromotionalEmailOptIn(?bool $promotionalEmailOptIn): self
    {
        $this->promotionalEmailOptIn = $promotionalEmailOptIn;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(?string $addressLine1): self
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function setAddressLine2(?string $addressLine2): self
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(?string $mobilePhone): self
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    public function getBirthday(): ?DateTimeImmutable
    {
        return $this->birthday;
    }

    public function setBirthday(?DateTimeImmutable $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getHomePhone(): ?string
    {
        return $this->homePhone;
    }

    public function setHomePhone(?string $homePhone): Client
    {
        $this->homePhone = $homePhone;

        return $this;
    }

    public function getWorkPhone(): ?string
    {
        return $this->workPhone;
    }

    public function setWorkPhone(?string $workPhone): Client
    {
        $this->workPhone = $workPhone;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getReferredBy(): ?string
    {
        return $this->referredBy;
    }

    public function setReferredBy(?string $referredBy): Client
    {
        $this->referredBy = $referredBy;

        return $this;
    }

    public function getEmergencyContactInfoName(): ?string
    {
        return $this->emergencyContactInfoName;
    }

    public function getEmergencyContactInfoRelationship(): ?string
    {
        return $this->emergencyContactInfoRelationship;
    }

    public function getEmergencyContactInfoPhone(): ?string
    {
        return $this->emergencyContactInfoPhone;
    }

    public function getHomeLocation(): ?HomeLocation
    {
        return $this->homeLocation;
    }
}
