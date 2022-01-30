<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class GETClientsRequest extends RESTRequest implements UserStaffTokenRequiredInterface
{
    use UserStaffTokenRequiredTrait;

    /**
     * @Serializer\SerializedName("ClientIds")
     * @Serializer\SkipWhenEmpty
     */
    private ?array $clientIds = null;

    /**
     * @Serializer\SerializedName("SearchText")
     * @Serializer\SkipWhenEmpty
     */
    private ?string $searchText = null;

    public function setClientIds(?array $clientIds): GETClientsRequest
    {
        $this->clientIds = $clientIds;

        return $this;
    }

    public function setSearchText(?string $searchText): GETClientsRequest
    {
        $this->searchText = $searchText;

        return $this;
    }

    public function getClientIds(): ?array
    {
        return $this->clientIds;
    }

    public function getSearchText(): ?string
    {
        return $this->searchText;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getPath(): string
    {
        return 'client/clients';
    }
}
