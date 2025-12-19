<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class POSTAddClientToClassRequest extends RESTRequest implements UserStaffTokenRequiredInterface
{
    use UserStaffTokenRequiredTrait;

    #[Serializer\SerializedName('ClientId')]
    private string $clientId;

    #[Serializer\SerializedName('ClassId')]
    private int $classId;

    #[Serializer\SerializedName('RequirePayment')]
    #[Serializer\SkipWhenEmpty]
    private ?bool $requirePayment;

    #[Serializer\SerializedName('Waitlist')]
    #[Serializer\SkipWhenEmpty]
    private ?bool $waitList;

    #[Serializer\SerializedName('SendEmail')]
    #[Serializer\SkipWhenEmpty]
    private ?bool $sendEmail;

    #[Serializer\SerializedName('CrossRegionalBooking')]
    #[Serializer\SkipWhenEmpty]
    private ?bool $crossRegionalBooking;

    #[Serializer\SerializedName('WaitlistEntryId')]
    #[Serializer\SkipWhenEmpty]
    private ?int $waitlistEntryId;

    #[Serializer\SerializedName('CrossRegionalBookingClientServiceSiteId')]
    #[Serializer\SkipWhenEmpty]
    private ?int $crossRegionalBookingClientServiceSiteId;

    public function __construct(string $clientId, int $classId)
    {
        $this->clientId                                = $clientId;
        $this->classId                                 = $classId;
        $this->requirePayment                          = null;
        $this->waitList                                = null;
        $this->sendEmail                               = null;
        $this->crossRegionalBooking                    = null;
        $this->waitlistEntryId                         = null;
        $this->crossRegionalBookingClientServiceSiteId = null;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getClassId(): int
    {
        return $this->classId;
    }

    public function isRequirePayment(): ?bool
    {
        return $this->requirePayment;
    }

    public function isWaitList(): ?bool
    {
        return $this->waitList;
    }

    public function isSendEmail(): ?bool
    {
        return $this->sendEmail;
    }

    public function isCrossRegionalBooking(): ?bool
    {
        return $this->crossRegionalBooking;
    }

    public function getCrossRegionalBookingClientServiceSiteId(): ?int
    {
        return $this->crossRegionalBookingClientServiceSiteId;
    }

    public function setCrossRegionalBookingClientServiceSiteId(?int $crossRegionalBookingClientServiceSiteId): self
    {
        $this->crossRegionalBookingClientServiceSiteId = $crossRegionalBookingClientServiceSiteId;

        return $this;
    }

    public function setRequirePayment(bool $requirePayment): self
    {
        $this->requirePayment = $requirePayment;

        return $this;
    }

    public function setWaitList(bool $waitList): self
    {
        $this->waitList = $waitList;

        return $this;
    }

    public function setSendEmail(bool $sendEmail): self
    {
        $this->sendEmail = $sendEmail;

        return $this;
    }

    public function setCrossRegionalBooking(bool $crossRegionalBooking): self
    {
        $this->crossRegionalBooking = $crossRegionalBooking;

        return $this;
    }

    public function setWaitlistEntryId(int $waitlistEntryId): self
    {
        $this->waitlistEntryId = $waitlistEntryId;

        return $this;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getPath(): string
    {
        return 'class/addclienttoclass';
    }
}
