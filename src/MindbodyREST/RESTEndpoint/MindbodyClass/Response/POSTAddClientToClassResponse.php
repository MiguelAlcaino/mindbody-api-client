<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model\Visit;

class POSTAddClientToClassResponse extends RESTResponse
{
    public function __construct(
        #[Serializer\SerializedName('Visit')]
        private readonly Visit $visit,
    ) {
    }

    public function getVisit(): Visit
    {
        return $this->visit;
    }
}
