<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Request;

use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\PaginatedRequestInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\PaginatedRequestTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class GETProgramsRequest extends RESTRequest implements PaginatedRequestInterface, UserStaffTokenRequiredInterface
{
    use PaginatedRequestTrait;
    use UserStaffTokenRequiredTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getPath(): string
    {
        return 'site/programs';
    }
}
