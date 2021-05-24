<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model;

use JMS\Serializer\Annotation as Serializer;

class CrossRegionalClientAssociation
{
    /**
     * @Serializer\SerializedName("SiteId")
     */
    private int $siteId;

    /**
     * @Serializer\SerializedName("ClientId")
     */
    private string $clientId;

    /**
     * @Serializer\SerializedName("UniqueId")
     */
    private int $uniqueId;

    public function getSiteId(): int
    {
        return $this->siteId;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getUniqueId(): int
    {
        return $this->uniqueId;
    }
}
