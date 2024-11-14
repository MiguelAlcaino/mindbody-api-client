<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

abstract class AbstractCredentials
{
    /**
     * @var string
     * @Serializer\SerializedName("Password")
     * @Serializer\XmlElement(cdata=false)
     */
    private $password;

    /**
     * @var array
     * @Serializer\SerializedName("SiteIDs")
     * @Serializer\XmlList(entry="int")
     */
    private $siteIds;

    public function __construct(string $password, array $siteIds)
    {
        $this->password = $password;
        $this->siteIds  = $siteIds;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getSiteIds(): array
    {
        return $this->siteIds;
    }
}
