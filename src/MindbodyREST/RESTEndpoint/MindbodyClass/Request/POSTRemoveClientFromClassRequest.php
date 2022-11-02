<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class POSTRemoveClientFromClassRequest extends RESTRequest implements UserStaffTokenRequiredInterface
{
    use UserStaffTokenRequiredTrait;

    /**
     * @Serializer\SerializedName("SendEmail")
     * @Serializer\SkipWhenEmpty
     */
    private bool $sendEmail;
    /**
     * @Serializer\SerializedName("LateCancel")
     * @Serializer\SkipWhenEmpty
     */
    private bool $lateCancel;

    public function __construct(
        /**
         * @Serializer\SerializedName("ClassId")
         */
        private readonly int $classId,
        /**
         * @Serializer\SerializedName("ClientId")
         */
        private readonly int $clientId
    ) {
        $this->sendEmail  = false;
        $this->lateCancel = false;
    }

    public function isSendEmail(): bool
    {
        return $this->sendEmail;
    }

    public function isLateCancel(): bool
    {
        return $this->lateCancel;
    }

    public function getClassId(): int
    {
        return $this->classId;
    }

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function setSendEmail(?bool $sendEmail): self
    {
        $this->sendEmail = $sendEmail;

        return $this;
    }

    public function setLateCancel(?bool $lateCancel): self
    {
        $this->lateCancel = $lateCancel;

        return $this;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getPath(): string
    {
        return 'class/removeclientfromclass';
    }
}
