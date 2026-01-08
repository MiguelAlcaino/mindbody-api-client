<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Model\VisitUpdateExecuteEnum;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class POSTUpdateClientVisitRequest extends RESTRequest implements UserStaffTokenRequiredInterface
{
    use UserStaffTokenRequiredTrait;

    #[Serializer\SerializedName('SignedIn')]
    #[Serializer\SkipWhenEmpty]
    private ?bool $signedIn = null;
    #[Serializer\SerializedName('Execute')]
    #[Serializer\SkipWhenEmpty]
    private ?string $execute = null;

    public function __construct(
        #[Serializer\SerializedName('VisitId')]
        private readonly int $visitId,
    ) {
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getPath(): string
    {
        return 'client/updateclientvisit';
    }

    public function getVisitId(): int
    {
        return $this->visitId;
    }

    public function getSignedIn(): bool
    {
        return $this->signedIn;
    }

    public function setSignedIn(bool $signedIn): POSTUpdateClientVisitRequest
    {
        $this->signedIn = $signedIn;

        return $this;
    }

    public function getExecute(): ?VisitUpdateExecuteEnum
    {
        if (null === $this->execute) {
            return null;
        }

        return VisitUpdateExecuteEnum::from($this->execute);
    }

    public function setExecute(VisitUpdateExecuteEnum $execute): POSTUpdateClientVisitRequest
    {
        $this->execute = $execute->value;

        return $this;
    }
}
