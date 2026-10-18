<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\PaginatedRequestInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\PaginatedRequestTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

/**
 * The staff user token is optional here: the endpoint answers without one, but a token can be
 * set when the caller wants the request made on behalf of a staff user.
 */
class GETClientPurchasesRequest extends RESTRequest implements PaginatedRequestInterface, UserStaffTokenRequiredInterface
{
    use PaginatedRequestTrait;
    use UserStaffTokenRequiredTrait;

    #[Serializer\SerializedName('StartDate')]
    #[Serializer\SkipWhenEmpty]
    private ?DateTimeImmutable $startDate = null;

    #[Serializer\SerializedName('EndDate')]
    #[Serializer\SkipWhenEmpty]
    private ?DateTimeImmutable $endDate = null;

    public function __construct(
        #[Serializer\SerializedName('ClientId')]
        private readonly int $clientId,
    ) {
    }

    public function getStartDate(): ?DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(DateTimeImmutable $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(DateTimeImmutable $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getPath(): string
    {
        return 'client/clientpurchases';
    }
}
