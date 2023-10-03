<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model\Visit;

class POSTUpdateClientVisitResponse extends RESTResponse
{
    public function __construct(
        #[Serializer\SerializedName('Visit')]
        private readonly Visit $visit)
    {
    }

    public function getVisit(): Visit
    {
        return $this->visit;
    }
}
