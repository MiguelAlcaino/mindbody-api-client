<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

class SourceCredentials extends AbstractCredentials
{
    /**
     * @var string
     * @Serializer\SerializedName("SourceName")
     * @Serializer\XmlElement(cdata=false)
     */
    private $sourceName;

    public function __construct(string $sourceName, string $password, array $siteIds)
    {
        $this->sourceName = $sourceName;
        parent::__construct($password, $siteIds);
    }

}
