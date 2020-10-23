<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response;

use JMS\Serializer\Annotation as Serializer;

class Service
{
    /**
     * @var float
     * @Serializer\SerializedName("Price")
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     */
    private $price;

    /**
     * @var float
     * @Serializer\SerializedName("OnlinePrice")
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     */
    private $onlinePrice;

    /**
     * @var int
     * @Serializer\SerializedName("ProgramID")
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     */
    private $programId;

    /**
     * @var float
     * @Serializer\SerializedName("TaxRate")
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     */
    private $taxRate;

    /**
     * @var int
     * @Serializer\SerializedName("ProductID")
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     */
    private $productId;

    /**
     * @var string
     * @Serializer\SerializedName("ID")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var string
     * @Serializer\SerializedName("Name")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * @var int
     * @Serializer\SerializedName("Count")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("int")
     */
    private $count;

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
