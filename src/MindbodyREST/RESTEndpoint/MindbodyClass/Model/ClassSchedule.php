<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Model\Location;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Staff\Model\StaffMember;

class ClassSchedule
{
    /**
     * @Serializer\SerializedName("Id")
     */
    private int $id;
    /**
     * @Serializer\SerializedName("IsAvailable")
     */
    private bool $isAvailable;
    /**
     * @Serializer\SerializedName("DaySunday")
     */
    private bool $daySunday;
    /**
     * @Serializer\SerializedName("DayMonday")
     */
    private bool $dayMonday;
    /**
     * @Serializer\SerializedName("DayTuesday")
     */
    private bool $dayTuesday;
    /**
     * @Serializer\SerializedName("DayWednesday")
     */
    private bool $dayWednesday;
    /**
     * @Serializer\SerializedName("DayThursday")
     */
    private bool $dayThursday;
    /**
     * @Serializer\SerializedName("DayFriday")
     */
    private bool $dayFriday;
    /**
     * @Serializer\SerializedName("DaySaturday")
     */
    private bool $daySaturday;
    /**
     * @Serializer\SerializedName("StartDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     */
    private DateTimeImmutable $startDate;
    /**
     * @Serializer\SerializedName("StartTime")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     */
    private DateTimeImmutable $startTime;
    /**
     * @Serializer\SerializedName("EndDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     */
    private DateTimeImmutable $endDate;
    /**
     * @Serializer\SerializedName("EndTime")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     */
    private DateTimeImmutable $endTime;
    /**
     * @Serializer\SerializedName("Location")
     */
    private Location $location;
    /**
     * @Serializer\SerializedName("ClassDescription")
     */
    private ClassDescription $classDescription;

    /**
     * @Serializer\SerializedName("Staff")
     */
    private StaffMember $staff;

    public function getId(): int
    {
        return $this->id;
    }

    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    public function isDaySunday(): bool
    {
        return $this->daySunday;
    }

    public function isDayMonday(): bool
    {
        return $this->dayMonday;
    }

    public function isDayTuesday(): bool
    {
        return $this->dayTuesday;
    }

    public function isDayWednesday(): bool
    {
        return $this->dayWednesday;
    }

    public function isDayThursday(): bool
    {
        return $this->dayThursday;
    }

    public function isDayFriday(): bool
    {
        return $this->dayFriday;
    }

    public function isDaySaturday(): bool
    {
        return $this->daySaturday;
    }

    public function getStartDate(): DateTimeImmutable
    {
        return $this->startDate;
    }

    public function getStartTime(): DateTimeImmutable
    {
        return $this->startTime;
    }

    public function getEndDate(): DateTimeImmutable
    {
        return $this->endDate;
    }

    public function getEndTime(): DateTimeImmutable
    {
        return $this->endTime;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function getClassDescription(): ClassDescription
    {
        return $this->classDescription;
    }

    public function getStaff(): StaffMember
    {
        return $this->staff;
    }
}
