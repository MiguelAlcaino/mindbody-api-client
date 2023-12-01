<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class Visit
{
    /**
     * @Serializer\SerializedName("Id")
     */
    private int $id;
    /**
     * @Serializer\SerializedName("ClassId")
     */
    private int $classId;
    /**
     * @Serializer\SerializedName("StartDateTime")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     */
    private DateTimeImmutable $startDateTime;
    /**
     * @Serializer\SerializedName("EndDateTime")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     */
    private DateTimeImmutable $endDateTime;
    /**
     * @Serializer\SerializedName("Name")
     */
    private ?string $name;
    /**
     * @Serializer\SerializedName("CrossRegionalBookingPerformed")
     * @Serializer\SkipWhenEmpty()
     */
    private ?bool $crossRegionalBookingPerformed = null;
    /**
     * @Serializer\SerializedName("AppointmentStatus")
     * @Serializer\SkipWhenEmpty()
     */
    private ?string $appointmentStatus = null;
    /**
     * @Serializer\SerializedName("LateCancelled")
     * @Serializer\SkipWhenEmpty()
     */
    private ?bool $lateCancelled = null;
    /**
     * @Serializer\SerializedName("ClientId")
     * @Serializer\SkipWhenEmpty()
     */
    private ?string $clientId = null;

    /**
     * @Serializer\SerializedName("LastModifiedDateTime")
     * @Serializer\SkipWhenEmpty()
     */
    private ?string $lastModifiedDateTime;

    /**
     * @Serializer\SerializedName("WaitlistEntryId")
     * @Serializer\SkipWhenEmpty()
     */
    private ?int $waitlistEntryId;
    #[Serializer\SerializedName("SignedIn")]
    private ?bool $signedIn;

    public function __construct(
        int               $id,
        int               $classId,
        DateTimeImmutable $startDateTime,
        DateTimeImmutable $endDateTime,
        string            $name
    )
    {
        $this->id            = $id;
        $this->classId       = $classId;
        $this->startDateTime = $startDateTime;
        $this->endDateTime   = $endDateTime;
        $this->name          = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getClassId(): int
    {
        return $this->classId;
    }

    public function getStartDateTime(): DateTimeImmutable
    {
        return $this->startDateTime;
    }

    public function getEndDateTime(): DateTimeImmutable
    {
        return $this->endDateTime;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function isCrossRegionalBookingPerformed(): ?bool
    {
        return $this->crossRegionalBookingPerformed;
    }

    public function getAppointmentStatus(): ?string
    {
        return $this->appointmentStatus;
    }

    public function getLateCancelled(): ?bool
    {
        return $this->lateCancelled;
    }

    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    public function getLastModifiedDateTime(): ?DateTimeImmutable
    {
        return new DateTimeImmutable($this->lastModifiedDateTime);
    }

    public function getCrossRegionalBookingPerformed(): ?bool
    {
        return $this->crossRegionalBookingPerformed;
    }

    public function getWaitlistEntryId(): ?int
    {
        return $this->waitlistEntryId;
    }

    public function getSignedIn(): ?bool
    {
        return $this->signedIn;
    }
}
