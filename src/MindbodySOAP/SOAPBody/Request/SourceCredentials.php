<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

class SourceCredentials extends AbstractCredentials
{
    #[Serializer\SerializedName("SourceName")]
    #[Serializer\XmlElement(cdata: false)]
    private string $sourceName;

    public function __construct(string $username, string $password, array $siteIds)
    {
        $this->sourceName = $username;
        parent::__construct($password, $siteIds);
    }

    public function getSourceName(): string
    {
        return $this->sourceName;
    }
}
