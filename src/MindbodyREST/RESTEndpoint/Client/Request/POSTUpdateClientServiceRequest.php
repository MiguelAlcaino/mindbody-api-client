<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class POSTUpdateClientServiceRequest extends RESTRequest implements UserStaffTokenRequiredInterface
{
    use UserStaffTokenRequiredTrait;

    #[Serializer\SerializedName('ActiveDate')]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d\\TH:i:s'>")]
    #[Serializer\SkipWhenEmpty]
    private ?DateTimeImmutable $activeDate = null;

    #[Serializer\SerializedName('ExpirationDate')]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d\\TH:i:s'>")]
    #[Serializer\SkipWhenEmpty]
    private ?DateTimeImmutable $expirationDate = null;

    #[Serializer\SerializedName('Count')]
    #[Serializer\SkipWhenEmpty]
    private ?int $count = null;

    public function __construct(
        #[Serializer\SerializedName('ServiceId')]
        private readonly int $serviceId,
    ) {
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getPath(): string
    {
        return 'client/updateclientservice';
    }

    public function getServiceId(): int
    {
        return $this->serviceId;
    }

    public function getActiveDate(): ?DateTimeImmutable
    {
        return $this->activeDate;
    }

    public function setActiveDate(DateTimeImmutable $activeDate): self
    {
        $this->activeDate = $activeDate;

        return $this;
    }

    public function getExpirationDate(): ?DateTimeImmutable
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(DateTimeImmutable $expirationDate): self
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }
}
