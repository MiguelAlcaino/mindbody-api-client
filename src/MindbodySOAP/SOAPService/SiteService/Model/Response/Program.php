<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Response;

use JMS\Serializer\Annotation as Serializer;

class Program
{
    #[Serializer\SerializedName('ID')]
    #[Serializer\Type('string')]
    #[Serializer\XmlElement(cdata: false)]
    private $id;

    #[Serializer\SerializedName('Name')]
    #[Serializer\Type('string')]
    #[Serializer\XmlElement(cdata: false)]
    private string $name;

    #[Serializer\SerializedName('ScheduleType')]
    #[Serializer\Type('string')]
    #[Serializer\XmlElement(cdata: false)]
    private $scheduleType;

    #[Serializer\SerializedName('CancelOffset')]
    #[Serializer\Type('int')]
    #[Serializer\XmlElement(cdata: false)]
    private int $cancelOffset;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
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
}
