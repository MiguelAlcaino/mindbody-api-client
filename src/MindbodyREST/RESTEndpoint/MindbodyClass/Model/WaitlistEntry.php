<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Model\BasicClient;

class WaitlistEntry
{
    #[Serializer\SerializedName("Id")]
    private readonly int $id;

    #[Serializer\SerializedName("RequestDateTime")]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")]
    private readonly DateTimeImmutable $requestDateTime;

    #[Serializer\SerializedName("Client")]
    private readonly BasicClient $client;

    #[Serializer\SerializedName("ClassId")]
    private int $classId;

    public function __construct(
        int               $id,
        DateTimeImmutable $requestDateTime,
        BasicClient       $client
    )
    {
        $this->id              = $id;
        $this->requestDateTime = $requestDateTime;
        $this->client          = $client;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRequestDateTime(): DateTimeImmutable
    {
        return $this->requestDateTime;
    }

    public function getClient(): BasicClient
    {
        return $this->client;
    }

    public function getClassId(): int
    {
        return $this->classId;
    }
}
