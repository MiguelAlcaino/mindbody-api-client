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

class GETClassesRequest extends RESTRequest implements UserStaffTokenRequiredInterface, PaginatedRequestInterface
{
    use UserStaffTokenRequiredTrait;
    use PaginatedRequestTrait;

    #[Serializer\SerializedName("StartDateTime")]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d'>")]
    #[Serializer\SkipWhenEmpty]
    private ?DateTimeImmutable $startDateTime;

    #[Serializer\SerializedName("EndDateTime")]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d'>")]
    #[Serializer\SkipWhenEmpty]
    private ?DateTimeImmutable $endDateTime;

    #[Serializer\SerializedName("ClassIds")]
    #[Serializer\SkipWhenEmpty]
    private ?int $classId;

    #[Serializer\SerializedName("ClassScheduleIds")]
    #[Serializer\SkipWhenEmpty]
    private ?int $classScheduleIds;

    #[Serializer\SerializedName("HideCanceledClasses")]
    private string $hideCanceledClasses = 'false';

    public function __construct()
    {
        $this->startDateTime    = null;
        $this->endDateTime      = null;
        $this->classId          = null;
        $this->classScheduleIds = null;
    }

    public function getStartDateTime(): ?DateTimeImmutable
    {
        return $this->startDateTime;
    }

    public function setStartDateTime(?DateTimeImmutable $startDateTime): GETClassesRequest
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    public function getEndDateTime(): ?DateTimeImmutable
    {
        return $this->endDateTime;
    }

    public function setEndDateTime(?DateTimeImmutable $endDateTime): GETClassesRequest
    {
        $this->endDateTime = $endDateTime;

        return $this;
    }

    public function getClassId(): ?int
    {
        return $this->classId;
    }

    public function setClassId(int $classId): self
    {
        $this->classId = $classId;

        return $this;
    }

    public function getClassScheduleIds(): ?int
    {
        return $this->classScheduleIds;
    }

    public function setClassScheduleIds(?int $classScheduleIds): self
    {
        $this->classScheduleIds = $classScheduleIds;

        return $this;
    }

    public function getHideCanceledClasses(): string
    {
        return $this->hideCanceledClasses;
    }

    public function setHideCanceledClasses(bool $hideCanceledClasses): self
    {
        $this->hideCanceledClasses = $hideCanceledClasses ? 'true' : 'false';

        return $this;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getPath(): string
    {
        return 'class/classes';
    }
}
