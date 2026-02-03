<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model\ClientVisit;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\PaginatedResponseInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\PaginatedResponseTrait;

class GETClientVisitsResponse extends RESTResponse implements PaginatedResponseInterface
{
    use PaginatedResponseTrait;

    /**
     * @var array<ClientVisit>
     */
    #[Serializer\SerializedName('Visits')]
    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model\ClientVisit>")]
    private array $visits;

    /**
     * @return ClientVisit[]
     */
    public function getVisits(): array
    {
        return $this->visits;
    }
}
