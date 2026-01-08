<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class BookingWindow
{
    #[Serializer\SerializedName('StartDateTime')]
    private string $startDateTime;
    #[Serializer\SerializedName('EndDateTime')]
    private string $endDateTime;

    public function getStartDateTime(): DateTimeImmutable
    {
        return new DateTimeImmutable($this->startDateTime);
    }

    public function getEndDateTime(): DateTimeImmutable
    {
        return new DateTimeImmutable($this->endDateTime);
    }
}
