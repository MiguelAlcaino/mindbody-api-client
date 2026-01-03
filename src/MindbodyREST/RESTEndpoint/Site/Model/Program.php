<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Model;

use JMS\Serializer\Annotation as Serializer;

class Program
{
    #[Serializer\SerializedName('Id')]
    private int $id;

    #[Serializer\SerializedName('Name')]
    private string $name;

    #[Serializer\SerializedName('ScheduleType')]
    private string $scheduleType;

    #[Serializer\SerializedName('CancelOffset')]
    private int $cancelOffset;

    /**
     * @var array<string>
     */
    #[Serializer\SerializedName('ContentFormats')]
    #[Serializer\Type('array<string>')]
    private array $contentFormats;

    #[Serializer\SerializedName('ScheduleOffset')]
    private int $scheduleOffset;

    #[Serializer\SerializedName('ScheduleOffsetEnd')]
    private int $scheduleOffsetEnd;

    #[Serializer\SerializedName('PricingRelationships')]
    private PricingRelationships $pricingRelationships;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getScheduleType(): string
    {
        return $this->scheduleType;
    }

    public function getCancelOffset(): int
    {
        return $this->cancelOffset;
    }

    /**
     * @return array<string>
     */
    public function getContentFormats(): array
    {
        return $this->contentFormats;
    }

    public function getScheduleOffset(): int
    {
        return $this->scheduleOffset;
    }

    public function getScheduleOffsetEnd(): int
    {
        return $this->scheduleOffsetEnd;
    }

    public function getPricingRelationships(): PricingRelationships
    {
        return $this->pricingRelationships;
    }
}
