<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

class UserCredentials extends AbstractCredentials
{
    #[Serializer\SerializedName("Username")]
    #[Serializer\XmlElement(cdata: false)]
    private string $username;

    public function __construct(string $username, string $password, array $siteIds)
    {
        $this->username = $username;
        parent::__construct($password, $siteIds);
    }

    public function getUsername(): string
    {
        return $this->username;
    }
}
