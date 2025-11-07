<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Enum\ItemTypeEnum;

class Item
{
    #[Serializer\SerializedName("ID")]
    #[Serializer\Type("int")]
    #[Serializer\XmlElement(cdata: false)]
    private int $id;

    #[Serializer\XmlAttribute]
    #[Serializer\SerializedName("xsi:type")]
    #[Serializer\Type("string")]
    private string $type;

    #[Serializer\SerializedName("Price")]
    #[Serializer\Type("float")]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\SkipWhenEmpty]
    private float $price;

    #[Serializer\SerializedName("Name")]
    #[Serializer\Type("string")]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\SkipWhenEmpty]
    private string $name;

    public function __construct(int $id, ItemTypeEnum $type)
    {
        $this->id   = $id;
        $this->type = $type->value;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
