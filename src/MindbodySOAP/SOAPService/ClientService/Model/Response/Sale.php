<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class Sale
{
    #[Serializer\SerializedName('ID')]
    #[Serializer\Type('string')]
    #[Serializer\XmlElement(cdata: false)]
    private $id;

    #[Serializer\SerializedName('SaleDateTime')]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s\Z'>")]
    #[Serializer\XmlElement(cdata: false)]
    private DateTimeImmutable $saleDateTime;

    #[Serializer\SerializedName('OriginalSaleDateTime')]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s\Z'>")]
    #[Serializer\XmlElement(cdata: false)]
    private DateTimeImmutable $originalSaleDateTime;

    public function getId(): string
    {
        return $this->id;
    }

    public function getSaleDateTime(): ?DateTimeImmutable
    {
        return $this->saleDateTime;
    }

    public function getOriginalSaleDateTime(): ?DateTimeImmutable
    {
        return $this->originalSaleDateTime;
    }
}
