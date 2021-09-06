<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use DateTimeImmutable;

class Sale
{
    /**
     * @var string
     * @Serializer\SerializedName("ID")
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     */
    private $id;

    /**
     * @var DateTimeImmutable
     * @Serializer\SerializedName("SaleDateTime")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s\Z'>")
     * @Serializer\XmlElement(cdata=false)
     */
    private $saleDateTime;

    /**
     * @var DateTimeImmutable
     * @Serializer\SerializedName("OriginalSaleDateTime")
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s\Z'>")
     * @Serializer\XmlElement(cdata=false)
     */
    private $originalSaleDateTime;

    public function getId(): string
    {
        return $this->id;
    }

    public function getSaleDateTime(): DateTimeImmutable
    {
        return $this->saleDateTime;
    }

    public function getOriginalSaleDateTime(): DateTimeImmutable
    {
        return $this->originalSaleDateTime;
    }
}
