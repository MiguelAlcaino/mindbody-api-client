<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class GETClassWaitlistEntriesRequest extends RESTRequest implements UserStaffTokenRequiredInterface
{
    use UserStaffTokenRequiredTrait;

    #[Serializer\SerializedName("ClassIds")]
    private int $classIds;

    #[Serializer\SerializedName("WaitlistEntryIds")]
    private int $waitlistEntryIds;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getPath(): string
    {
        return '/class/waitlistentries';
    }

    public function getClassIds(): int
    {
        return $this->classIds;
    }

    public function setClassIds(int $classIds): GETClassWaitlistEntriesRequest
    {
        $this->classIds = $classIds;

        return $this;
    }

    public function getWaitlistEntryIds(): int
    {
        return $this->waitlistEntryIds;
    }

    public function setWaitlistEntryIds(int $waitlistEntryIds): GETClassWaitlistEntriesRequest
    {
        $this->waitlistEntryIds = $waitlistEntryIds;

        return $this;
    }
}
