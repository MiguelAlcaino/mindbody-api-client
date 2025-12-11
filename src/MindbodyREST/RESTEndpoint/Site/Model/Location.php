<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Model;

use JMS\Serializer\Annotation as Serializer;

class Location
{
    #[Serializer\SerializedName('SiteID')]
    private ?int $siteId;

    public function getSiteId(): ?int
    {
        return $this->siteId;
    }
}
