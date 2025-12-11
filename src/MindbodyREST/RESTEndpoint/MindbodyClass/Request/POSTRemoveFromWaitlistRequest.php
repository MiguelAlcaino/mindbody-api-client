<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request;

use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class POSTRemoveFromWaitlistRequest extends RESTRequest implements UserStaffTokenRequiredInterface
{
    use UserStaffTokenRequiredTrait;

    public function __construct(
        private readonly int $waitlistEntryId,
    ) {
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getPath(): string
    {
        return 'class/removeFromWaitlist?WaitlistEntryIds=' . $this->waitlistEntryId;
    }
}
