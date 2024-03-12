<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Model\Location;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Staff\Model\StaffMember;

class MindbodyClass
{
    /**
     * @Serializer\SerializedName("Id")
     */
    private int $id;
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
     * @Serializer\SerializedName("ClassDescription")
     */
    private ClassDescription $classDescription;

    /**
     * @Serializer\SerializedName("Staff")
     */
    private StaffMember $staff;

    /**
     * @Serializer\SerializedName("Location")
     */
    private Location $location;

    /**
     * @Serializer\SerializedName("MaxCapacity")
     * @Serializer\SkipWhenEmpty()
     */
    private ?int $maxCapacity;

    /**
     * @Serializer\SerializedName("WebCapacity")
     * @Serializer\SkipWhenEmpty()
     */
    private ?int $webCapacity;
    /**
     * @Serializer\SerializedName("TotalBooked")
     * @Serializer\SkipWhenEmpty()
     */
    private ?int $totalBooked;

    /**
     * @var null|Visit[] $visits
     * @Serializer\SerializedName("Visits")
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model\Visit>")
     * @Serializer\SkipWhenEmpty()
     */
    private ?array $visits;

    /**
     * @Serializer\SerializedName("Substitute")
     * @Serializer\SkipWhenEmpty()
     */
    private ?bool $substitute = null;

    /**
     * @Serializer\SerializedName("BookingWindow")
     */
    private ?BookingWindow $bookingWindow;

    /**
     * @Serializer\SerializedName("IsWaitlistAvailable")
     */
    private bool $isWaitlistAvailable;

    /**
     * @Serializer\SerializedName("WaitlistSize")
     */
    private ?int $waitlistSize;

    /**
     * @Serializer\SerializedName("ClassScheduleId")
     */
    private int $classScheduleId;

    public function __construct(
        int $id,
        DateTimeImmutable $startDateTime,
        DateTimeImmutable $endDateTime,
        ClassDescription $classDescription
    ) {
        $this->id               = $id;
        $this->startDateTime    = $startDateTime;
        $this->endDateTime      = $endDateTime;
        $this->classDescription = $classDescription;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStartDateTime(): DateTimeImmutable
    {
        return $this->startDateTime;
    }

    public function getEndDateTime(): DateTimeImmutable
    {
        return $this->endDateTime;
    }

    public function getClassDescription(): ClassDescription
    {
        return $this->classDescription;
    }

    public function getMaxCapacity(): ?int
    {
        return $this->maxCapacity;
    }

    public function getTotalBooked(): ?int
    {
        return $this->totalBooked;
    }

    /**
     * @return null|Visit[]
     */
    public function getVisits(): ?array
    {
        return $this->visits;
    }

    public function getStaff(): StaffMember
    {
        return $this->staff;
    }

    public function getWebCapacity(): ?int
    {
        return $this->webCapacity;
    }

    public function getSubstitute(): ?bool
    {
        return $this->substitute;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function getBookingWindow(): ?BookingWindow
    {
        return $this->bookingWindow;
    }

    public function isWaitlistAvailable(): bool
    {
        return $this->isWaitlistAvailable;
    }

    public function getClassScheduleId(): int
    {
        return $this->classScheduleId;
    }

    public function getWaitlistSize(): ?int
    {
        return $this->waitlistSize;
    }
}
