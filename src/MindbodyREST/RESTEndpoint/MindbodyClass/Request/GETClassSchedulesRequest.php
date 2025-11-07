<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\PaginatedRequestInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\PaginatedRequestTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class GETClassSchedulesRequest extends RESTRequest implements UserStaffTokenRequiredInterface, PaginatedRequestInterface
{
    use UserStaffTokenRequiredTrait;
    use PaginatedRequestTrait;

    #[Serializer\SerializedName("StartDate")]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d'>")]
    #[Serializer\SkipWhenEmpty]
    private ?DateTimeImmutable $startDate;

    #[Serializer\SerializedName("EndDate")]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d'>")]
    #[Serializer\SkipWhenEmpty]
    private ?DateTimeImmutable $endDate;

    #[Serializer\SerializedName("ClassScheduleIds")]
    private ?int $classScheduleIds;

    public function setStartDate(?DateTimeImmutable $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function setEndDate(?DateTimeImmutable $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function setClassScheduleIds(?int $classScheduleIds): self
    {
        $this->classScheduleIds = $classScheduleIds;

        return $this;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getPath(): string
    {
        return 'class/classschedules';
    }
}
