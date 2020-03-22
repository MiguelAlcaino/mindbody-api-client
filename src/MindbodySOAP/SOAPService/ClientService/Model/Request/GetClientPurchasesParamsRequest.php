<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestParamsInterface;

class GetClientPurchasesParamsRequest implements RequestParamsInterface
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ClientID")
     * @Serializer\XmlElement(cdata=false)
     */
    private $clientId;

    /**
     * @var DateTimeImmutable
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("StartDate")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     */
    private $startDate;

    /**
     * @var DateTimeImmutable
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     * @Serializer\SerializedName("EndDate")
     * @Serializer\XmlElement(cdata=false)
     */
    private $endDate;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SaleID")
     * @Serializer\XmlElement(cdata=false)
     */
    private $saleId;

    public function __construct(string $clientId)
    {
        $this->clientId = $clientId;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getStartDate(): DateTimeImmutable
    {
        return $this->startDate;
    }

    public function getEndDate(): DateTimeImmutable
    {
        return $this->endDate;
    }

    public function getSaleId(): string
    {
        return $this->saleId;
    }

    public function setStartDate(DateTimeImmutable $startDate): GetClientPurchasesParamsRequest
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function setEndDate(DateTimeImmutable $endDate): GetClientPurchasesParamsRequest
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function setSaleId(string $saleId): GetClientPurchasesParamsRequest
    {
        $this->saleId = $saleId;

        return $this;
    }
}