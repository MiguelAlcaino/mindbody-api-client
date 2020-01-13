<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

class UserCredentials extends AbstractCredentials
{
    /**
     * @var string
     * @Serializer\SerializedName("Username")
     * @Serializer\XmlElement(cdata=false)
     */
    private $username;

    public function __construct(string $username, string $password, array $siteIds)
    {
        $this->username = $username;
        parent::__construct($password, $siteIds);
    }

}
