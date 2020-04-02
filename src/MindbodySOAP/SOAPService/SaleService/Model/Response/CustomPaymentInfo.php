<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response;

use JMS\Serializer\Annotation as Serializer;

class CustomPaymentInfo
{
    /**
     * @var string
     * @Serializer\SerializedName("Name")
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     */
    private $name;

    /**
     * @var int
     * @Serializer\SerializedName("Amount")
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     */
    private $amount;

    /**
     * @var int
     * @Serializer\SerializedName("ID")
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     */
    private $id;

    public function getName(): string
    {
        return $this->name;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getId(): int
    {
        return $this->id;
    }
}