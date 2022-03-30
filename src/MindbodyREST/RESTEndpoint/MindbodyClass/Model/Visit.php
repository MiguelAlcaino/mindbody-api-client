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
    private string $name;
    /**
     * @Serializer\SerializedName("CrossRegionalBookingPerformed")
     */
    private bool $crossRegionalBookingPerformed;

    public function __construct(
        int $id,
        int $classId,
        DateTimeImmutable $startDateTime,
        DateTimeImmutable $endDateTime,
        string $name,
        bool $crossRegionalBookingPerformed
    ) {
        $this->id                            = $id;
        $this->classId                       = $classId;
        $this->startDateTime                 = $startDateTime;
        $this->endDateTime                   = $endDateTime;
        $this->name                          = $name;
        $this->crossRegionalBookingPerformed = $crossRegionalBookingPerformed;
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

    public function getName(): string
    {
        return $this->name;
    }

    public function isCrossRegionalBookingPerformed(): bool
    {
        return $this->crossRegionalBookingPerformed;
    }
}
