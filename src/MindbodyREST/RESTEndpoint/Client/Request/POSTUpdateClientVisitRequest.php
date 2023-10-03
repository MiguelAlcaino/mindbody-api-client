<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class POSTUpdateClientVisitRequest extends RESTRequest implements UserStaffTokenRequiredInterface
{
    use UserStaffTokenRequiredTrait;

    public function __construct(
        #[Serializer\SerializedName('VisitId')]
        private readonly int  $visitId,
        #[Serializer\SerializedName('SignedIn')]
        private readonly bool $signedIn,
    )
    {
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
}
