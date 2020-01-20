<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model;

use JMS\Serializer\Annotation as Serializer;

class Client
{
    /**
     * @var string
     * @Serializer\SerializedName("ID")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("int")
     */
    private $id;

    /**
     * @var bool|null
     * @Serializer\SerializedName("PromotionalEmailOptIn")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("bool")
     */
    private $promotionalEmailOptIn;

    /**
     * @var string|null
     * @Serializer\SerializedName("FirstName")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("string")
     */
    private $firstName;

    /**
     * @var string|null
     * @Serializer\SerializedName("LastName")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("string")
     */
    private $lastName;

    /**
     * @var string|null
     * @Serializer\SerializedName("Email")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("string")
     */
    private $email;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function isPromotionalEmailOptIn(): ?bool
    {
        return $this->promotionalEmailOptIn;
    }

    public function setPromotionalEmailOptIn(?bool $promotionalEmailOptIn): Client
    {
        $this->promotionalEmailOptIn = $promotionalEmailOptIn;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): Client
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): Client
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): Client
    {
        $this->email = $email;

        return $this;
    }
}
