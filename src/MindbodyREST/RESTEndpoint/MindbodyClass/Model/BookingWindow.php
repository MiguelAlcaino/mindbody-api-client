<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class BookingWindow
{
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

    public function getStartDateTime(): DateTimeImmutable
    {
        return $this->startDateTime;
    }

    public function getEndDateTime(): DateTimeImmutable
    {
        return $this->endDateTime;
    }
}
