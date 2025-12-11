<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\PaginatedResponseInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\PaginatedResponseTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model\ClassSchedule;

class GETClassSchedulesResponse extends RESTResponse implements PaginatedResponseInterface
{
    use PaginatedResponseTrait;

    /**
     * @var ClassSchedule[]
     */
    #[Serializer\SerializedName("ClassSchedules")]
    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model\ClassSchedule>")]
    private array $classSchedules;

    public function getClassSchedules(): array
    {
        return $this->classSchedules;
    }
}
