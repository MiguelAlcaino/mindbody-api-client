<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Response\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class ClientService
{
    /**
     * @var DateTimeImmutable
     * @Serializer\SerializedName("ActiveDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     */
    private DateTimeImmutable $activeDate;

    /**
     * @var DateTimeImmutable
     * @Serializer\SerializedName("ExpirationDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     */
    private DateTimeImmutable $expirationDate;

    public function getActiveDate(): DateTimeImmutable
    {
        return $this->activeDate;
    }

    public function getExpirationDate(): DateTimeImmutable
    {
        return $this->expirationDate;
    }
}
