<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Staff\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class GETStaffRequest extends RESTRequest implements UserStaffTokenRequiredInterface
{
    use UserStaffTokenRequiredTrait;

    #[Serializer\SerializedName('StaffIds')]
    #[Serializer\SkipWhenEmpty]
    private ?int $staffIds;

    public function getStaffIds(): int
    {
        return $this->staffIds;
    }

    public function setStaffIds(int $staffIds): GETStaffRequest
    {
        $this->staffIds = $staffIds;

        return $this;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getPath(): string
    {
        return '/staff/staff';
    }
}
