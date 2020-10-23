<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractParamsRequest;

class ValidateLoginParamsRequest extends AbstractParamsRequest
{
    /**
     * @var string
     * @Serializer\SerializedName("Username")
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     */
    private $username;

    /**
     * @var string
     * @Serializer\SerializedName("Password")
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     */
    private $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
