<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Staff;

use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\RESTRequesterExecutor;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Staff\Request\GETStaffRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Staff\Response\GETStaffResponse;

class StaffRESTRequester
{
    public function __construct(
        private readonly RESTRequesterExecutor $restRequester,
    ) {
    }

    public function getStaff(GETStaffRequest $request): GETStaffResponse
    {
        return $this->restRequester->executeRequest($request, GETStaffResponse::class);
    }
}
