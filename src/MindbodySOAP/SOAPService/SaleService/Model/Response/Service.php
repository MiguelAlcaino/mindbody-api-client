<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response;

use JMS\Serializer\Annotation as Serializer;

class Service
{
    #[Serializer\SerializedName("Price")]
    #[Serializer\Type("float")]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\SkipWhenEmpty]
    private $price;

    #[Serializer\SerializedName("OnlinePrice")]
    #[Serializer\Type("float")]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\SkipWhenEmpty]
    private float $onlinePrice;

    #[Serializer\SerializedName("ProgramID")]
    #[Serializer\Type("int")]
    #[Serializer\XmlElement(cdata: false)]
    private $programId;

    #[Serializer\SerializedName("TaxRate")]
    #[Serializer\Type("float")]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\SkipWhenEmpty]
    private float $taxRate;

    #[Serializer\SerializedName("ProductID")]
    #[Serializer\Type("int")]
    #[Serializer\XmlElement(cdata: false)]
    private $productId;

    #[Serializer\SerializedName("ID")]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private string $id;

    #[Serializer\SerializedName("Name")]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("string")]
    private $name;

    #[Serializer\SerializedName("Count")]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("int")]
    private int $count;

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getOnlinePrice(): float
    {
        return $this->onlinePrice;
    }

    public function getProgramId(): int
    {
        return $this->programId;
    }

    public function getTaxRate(): float
    {
        return $this->taxRate;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}
