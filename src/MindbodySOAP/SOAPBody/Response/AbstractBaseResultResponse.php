<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response;

use JMS\Serializer\Annotation as Serializer;

abstract class AbstractBaseResultResponse
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Status")
     * @Serializer\XmlElement(cdata=false)
     */
    private $status;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ErrorCode")
     * @Serializer\XmlElement(cdata=false)
     */
    private $errorCode;

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

}
