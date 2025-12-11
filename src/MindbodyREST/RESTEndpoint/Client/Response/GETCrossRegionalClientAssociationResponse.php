<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model\CrossRegionalClientAssociation;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;

class GETCrossRegionalClientAssociationResponse extends RESTResponse
{
    /**
     * @var array<CrossRegionalClientAssociation>
     */
    #[Serializer\SerializedName("CrossRegionalClientAssociations")]
    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model\CrossRegionalClientAssociation>")]
    private array $crossRegionalClientAssociations;

    /**
     * @return CrossRegionalClientAssociation[]
     */
    public function getCrossRegionalClientAssociations(): array
    {
        return $this->crossRegionalClientAssociations;
    }
}
