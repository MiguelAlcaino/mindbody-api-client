<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\PaginatedResponseInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\PaginatedResponseTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Model\Program;

class GETProgramsResponse extends RESTResponse implements PaginatedResponseInterface
{
    use PaginatedResponseTrait;

    /**
     * @var array<Program>
     */
    #[Serializer\SerializedName('Programs')]
    #[Serializer\Type('array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Model\Program>')]
    private array $programs;

    /**
     * @return array<Program>
     */
    public function getPrograms(): array
    {
        return $this->programs;
    }
}
