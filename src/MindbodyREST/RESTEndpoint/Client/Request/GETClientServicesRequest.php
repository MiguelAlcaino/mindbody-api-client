<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\PaginatedRequestInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\PaginatedRequestTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class GETClientServicesRequest extends RESTRequest implements UserStaffTokenRequiredInterface, PaginatedRequestInterface
{
    use UserStaffTokenRequiredTrait, PaginatedRequestTrait;

    /**
     * @Serializer\SerializedName("ClientId")
     */
    private string $clientId;
    /**
     * @Serializer\SerializedName("StartDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     */
    private DateTimeImmutable $startDate;
    /**
     * @Serializer\SerializedName("EndDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     */
    private DateTimeImmutable $endDate;

    public function __construct(string $clientId)
    {
        $this->clientId = $clientId;
    }

    public function setStartDate(DateTimeImmutable $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function setEndDate(DateTimeImmutable $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getPath(): string
    {
        return 'client/clientservices';
    }
}
