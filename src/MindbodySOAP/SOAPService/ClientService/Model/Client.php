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
     */
    private $id;

    /**
     * @var bool
     * @Serializer\SerializedName("PromotionalEmailOptIn")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     */
    private $promotionalEmailOptIn;

    /**
     * @var string
     * @Serializer\SerializedName("FirstName")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     */
    private $firstName;

    /**
     * @var string
     * @Serializer\SerializedName("LastName")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     */
    private $lastName;

    /**
     * @var string
     * @Serializer\SerializedName("Email")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     */
    private $email;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function setPromotionalEmailOptIn(bool $promotionalEmailOptIn): Client
    {
        $this->promotionalEmailOptIn = $promotionalEmailOptIn;

        return $this;
    }

    public function setFirstName(string $firstName): Client
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setLastName(string $lastName): Client
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function setEmail(string $email): Client
    {
        $this->email = $email;

        return $this;
    }
}
