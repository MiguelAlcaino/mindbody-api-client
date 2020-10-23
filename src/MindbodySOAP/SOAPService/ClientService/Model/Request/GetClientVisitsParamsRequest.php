<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractParamsRequest;

class GetClientVisitsParamsRequest extends AbstractParamsRequest
{
    /**
     * @var string
     * @Serializer\SerializedName("ClientID")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("string")
     */
    private $clientId;

    /**
     * @var bool
     * @Serializer\SerializedName("UnpaidsOnly")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("bool")
     */
    private $unpaidsOnly;

    /**
     * @var DateTimeImmutable|null
     * @Serializer\SerializedName("StartDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     * @Serializer\XmlElement(cdata=false)
     */
    private $startDate;

    /**
     * @var DateTimeImmutable|null
     * @Serializer\SerializedName("EndDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     * @Serializer\XmlElement(cdata=false)
     */
    private $endDate;

    public function __construct(string $clientId)
    {
        $this->clientId = $clientId;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function isUnpaidsOnly(): bool
    {
        return $this->unpaidsOnly;
    }

    public function setUnpaidsOnly(bool $unpaidsOnly): self
    {
        $this->unpaidsOnly = $unpaidsOnly;

        return $this;
    }

    public function getStartDate(): ?DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(?DateTimeImmutable $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?DateTimeImmutable $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }
}
