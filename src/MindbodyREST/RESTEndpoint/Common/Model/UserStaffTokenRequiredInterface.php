<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model;

interface UserStaffTokenRequiredInterface
{
    public function setUserStaffToken(string $staffToken);

    public function getUserStaffToken(): ?string;
}
