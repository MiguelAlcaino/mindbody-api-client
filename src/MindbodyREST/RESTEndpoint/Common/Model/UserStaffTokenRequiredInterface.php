<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model;

interface UserStaffTokenRequiredInterface
{
    public function setUserStaffToken(?string $staffToken): self;

    public function getUserStaffToken(): ?string;
}
