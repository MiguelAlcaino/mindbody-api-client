<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request;

use JMS\Serializer\Annotation\SerializedName;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\PaginatedRequestInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\PaginatedRequestTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class GETClassDescriptionsRequest extends RESTRequest implements UserStaffTokenRequiredInterface, PaginatedRequestInterface
{
    use UserStaffTokenRequiredTrait;
    use PaginatedRequestTrait;

    #[SerializedName('ClassDescriptionId')]
    private ?int $classDescriptionId;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getPath(): string
    {
        return 'class/classdescriptions';
    }
}
