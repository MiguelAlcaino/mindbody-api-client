<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model\WaitlistEntry;

class GETClassWaitlistEntriesResponse extends RESTResponse
{
    /**
     * @var WaitlistEntry[]
     */
    #[Serializer\SerializedName('WaitlistEntries')]
    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model\WaitlistEntry>")]
    public readonly array $waitlistEntries;
}
