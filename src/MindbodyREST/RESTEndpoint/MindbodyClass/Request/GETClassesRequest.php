<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class GETClassesRequest extends RESTRequest implements UserStaffTokenRequiredInterface
{
    use UserStaffTokenRequiredTrait;

    /**
     * @Serializer\SerializedName("StartDateTime")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     */
    private DateTimeImmutable $startDateTime;

    /**
     * @Serializer\SerializedName("EndDateTime")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     */
    private DateTimeImmutable $endDateTime;

    public function getStartDateTime(): DateTimeImmutable
    {
        return $this->startDateTime;
    }

    public function setStartDateTime(DateTimeImmutable $startDateTime): GETClassesRequest
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    public function getEndDateTime(): DateTimeImmutable
    {
        return $this->endDateTime;
    }

    public function setEndDateTime(DateTimeImmutable $endDateTime): GETClassesRequest
    {
        $this->endDateTime = $endDateTime;

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
