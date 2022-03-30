<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model\Visit;

class POSTAddClientToClassResponse extends RESTResponse
{
    /**
     * @Serializer\SerializedName("Visit")
     */
    private Visit $visit;

    public function __construct(Visit $visit)
    {
        $this->visit = $visit;
    }

    public function getVisit(): Visit
    {
        return $this->visit;
    }
}
