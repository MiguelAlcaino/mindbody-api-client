<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util;

use JMS\Serializer\Annotation as Serializer;

trait UserStaffTokenRequiredTrait
{
    /**
     * @Serializer\Exclude
     */
    private ?string $userStaffToken = null;

    public function getUserStaffToken(): ?string
    {
        return $this->userStaffToken;
    }

    public function setUserStaffToken(?string $userStaffToken): self
    {
        $this->userStaffToken = $userStaffToken;

        return $this;
    }
}
