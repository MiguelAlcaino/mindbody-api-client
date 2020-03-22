<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Response\Program;

class ClientService
{
    /**
     * @var bool
     * @Serializer\SerializedName("Current")
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     */
    private $current;

    /**
     * @var int
     * @Serializer\SerializedName("Count")
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     */
    private $count;

    /**
     * @var int
     * @Serializer\SerializedName("Remaining")
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     */
    private $remaining;

    /**
     * @var string
     * @Serializer\SerializedName("ID")
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     */
    private $id;

    /**
     * @var string
     * @Serializer\SerializedName("Name")
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     */
    private $name;

    /**
     * @var DateTimeImmutable
     * @Serializer\SerializedName("PaymentDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     * @Serializer\XmlElement(cdata=false)
     */
    private $paymentDate;

    /**
     * @var DateTimeImmutable
     * @Serializer\SerializedName("ActiveDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     * @Serializer\XmlElement(cdata=false)
     */
    private $activeDate;

    /**
     * @var DateTimeImmutable
     * @Serializer\SerializedName("ExpirationDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     * @Serializer\XmlElement(cdata=false)
     */
    private $expirationDate;

    /**
     * @var Program
     * @Serializer\SerializedName("Program")
     * @Serializer\Type("MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Response\Program")
     * @Serializer\XmlElement(cdata=false)
     */
    private $program;

    /**
     * @var int
     * @Serializer\SerializedName("SiteID")
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     */
    private $siteId;

    public function isCurrent(): bool
    {
        return $this->current;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getRemaining(): int
    {
        return $this->remaining;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPaymentDate(): DateTimeImmutable
    {
        return $this->paymentDate;
    }

    public function getActiveDate(): DateTimeImmutable
    {
        return $this->activeDate;
    }

    public function getExpirationDate(): DateTimeImmutable
    {
        return $this->expirationDate;
    }

    public function getProgram(): Program
    {
        return $this->program;
    }

    public function getSiteId(): int
    {
        return $this->siteId;
    }
}