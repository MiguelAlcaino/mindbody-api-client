<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

abstract class AbstractCredentials
{
    #[Serializer\SerializedName("Password")]
    #[Serializer\XmlElement(cdata: false)]
    private string $password;

    #[Serializer\SerializedName("SiteIDs")]
    #[Serializer\XmlList(entry: "int")]
    private array $siteIds;

    /**
     * @param string $password
     * @param int[] $siteIds
     */
    public function __construct(string $password, array $siteIds)
    {
        $this->password = $password;
        $this->siteIds  = $siteIds;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return int[]
     */
    public function getSiteIds(): array
    {
        return $this->siteIds;
    }
}
