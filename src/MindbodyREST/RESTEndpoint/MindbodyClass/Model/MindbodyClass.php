<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

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
    private Staff $staff;

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
}
