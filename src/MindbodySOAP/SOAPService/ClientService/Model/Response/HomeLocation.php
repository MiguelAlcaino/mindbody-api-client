<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use JMS\Serializer\Annotation as Serializer;

class HomeLocation
{
    /**
     * @var int
     * @Serializer\SerializedName("SiteID")
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     */
    private $siteId;

    public function getSiteId(): int
    {
        return $this->siteId;
    }
}
