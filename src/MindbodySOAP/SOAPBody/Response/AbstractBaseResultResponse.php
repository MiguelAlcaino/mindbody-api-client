<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Model\AbstractSerializable;

abstract class AbstractBaseResultResponse extends AbstractSerializable implements SOAPMethodResultInterface
{
    #[Serializer\Type("string")]
    #[Serializer\SerializedName("Status")]
    #[Serializer\XmlElement(cdata: false)]
    private $status;

    #[Serializer\Type("int")]
    #[Serializer\SerializedName("ErrorCode")]
    #[Serializer\XmlElement(cdata: false)]
    private int $errorCode;

    #[Serializer\Type("string")]
    #[Serializer\SerializedName("XMLDetail")]
    #[Serializer\XmlElement(cdata: false)]
    private string $xmlDetail;

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    public function getXmlDetail(): string
    {
        return $this->xmlDetail;
    }
}
