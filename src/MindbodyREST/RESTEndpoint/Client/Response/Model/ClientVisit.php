<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class ClientVisit
{
    #[Serializer\SerializedName('Id')]
    private int $id;

    #[Serializer\SerializedName('AppointmentId')]
    private int $appointmentId;

    #[Serializer\SerializedName('AppointmentGenderPreference')]
    private string $appointmentGenderPreference;

    #[Serializer\SerializedName('AppointmentStatus')]
    private string $appointmentStatus;

    #[Serializer\SerializedName('ClassId')]
    private int $classId;

    #[Serializer\SerializedName('ClientId')]
    private string $clientId;

    #[Serializer\SerializedName('ClientPhotoUrl')]
    private ?string $clientPhotoUrl;

    #[Serializer\SerializedName('ClientUniqueId')]
    private int $clientUniqueId;

    #[Serializer\SerializedName('StartDateTime')]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s.v', '', ['Y-m-d\TH:i:s.v', 'Y-m-d\TH:i:s']>")]
    private DateTimeImmutable $startDateTime;

    #[Serializer\SerializedName('EndDateTime')]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s.v', '', ['Y-m-d\TH:i:s.v', 'Y-m-d\TH:i:s']>")]
    private DateTimeImmutable $endDateTime;

    #[Serializer\SerializedName('LastModifiedDateTime')]
    private string $lastModifiedDateTime;

    #[Serializer\SerializedName('LateCancelled')]
    private bool $lateCancelled;

    #[Serializer\SerializedName('SiteId')]
    private int $siteId;

    #[Serializer\SerializedName('LocationId')]
    private int $locationId;

    #[Serializer\SerializedName('MakeUp')]
    private bool $makeUp;

    #[Serializer\SerializedName('Name')]
    private string $name;

    #[Serializer\SerializedName('ServiceId')]
    private ?int $serviceId = null;

    #[Serializer\SerializedName('ServiceName')]
    private ?string $serviceName = null;

    #[Serializer\SerializedName('Service')]
    private ?VisitService $service = null;

    #[Serializer\SerializedName('ProductId')]
    private ?int $productId = null;

    #[Serializer\SerializedName('SignedIn')]
    private bool $signedIn;

    #[Serializer\SerializedName('StaffId')]
    private int $staffId;

    #[Serializer\SerializedName('WebSignup')]
    private bool $webSignup;

    #[Serializer\SerializedName('Action')]
    private string $action;

    #[Serializer\SerializedName('Missed')]
    private bool $missed;

    #[Serializer\SerializedName('VisitType')]
    private int $visitType;

    #[Serializer\SerializedName('TypeGroup')]
    private int $typeGroup;

    #[Serializer\SerializedName('TypeTaken')]
    private string $typeTaken;

    public function getId(): int
    {
        return $this->id;
    }

    public function getAppointmentId(): int
    {
        return $this->appointmentId;
    }

    public function getAppointmentGenderPreference(): string
    {
        return $this->appointmentGenderPreference;
    }

    public function getAppointmentStatus(): string
    {
        return $this->appointmentStatus;
    }

    public function getClassId(): int
    {
        return $this->classId;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getClientPhotoUrl(): ?string
    {
        return $this->clientPhotoUrl;
    }

    public function getClientUniqueId(): int
    {
        return $this->clientUniqueId;
    }

    public function getStartDateTime(): DateTimeImmutable
    {
        return $this->startDateTime;
    }

    public function getEndDateTime(): DateTimeImmutable
    {
        return $this->endDateTime;
    }

    public function getLastModifiedDateTime(): DateTimeImmutable
    {
        return new DateTimeImmutable($this->lastModifiedDateTime);
    }

    public function getLateCancelled(): bool
    {
        return $this->lateCancelled;
    }

    public function getSiteId(): int
    {
        return $this->siteId;
    }

    public function getLocationId(): int
    {
        return $this->locationId;
    }

    public function getMakeUp(): bool
    {
        return $this->makeUp;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getServiceId(): ?int
    {
        return $this->serviceId;
    }

    public function getServiceName(): ?string
    {
        return $this->serviceName;
    }

    public function getService(): ?VisitService
    {
        return $this->service;
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function getSignedIn(): bool
    {
        return $this->signedIn;
    }

    public function getStaffId(): int
    {
        return $this->staffId;
    }

    public function getWebSignup(): bool
    {
        return $this->webSignup;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getMissed(): bool
    {
        return $this->missed;
    }

    public function getVisitType(): int
    {
        return $this->visitType;
    }

    public function getTypeGroup(): int
    {
        return $this->typeGroup;
    }

    public function getTypeTaken(): string
    {
        return $this->typeTaken;
    }
}
