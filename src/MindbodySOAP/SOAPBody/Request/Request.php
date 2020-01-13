<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

class Request
{
    /**
     * @var SourceCredentials
     * @Serializer\SerializedName("SourceCredentials")
     */
    private $sourceCredentials;

    /**
     * @var UserCredentials
     * @Serializer\SerializedName("UserCredentials")
     */
    private $userCredentials;

    /**
     * @var string
     * @Serializer\SerializedName("XMLDetail")
     * @Serializer\XmlElement(cdata=false)
     */
    private $xmlDetails;

    public function __construct(
        SourceCredentials $sourceCredentials,
        UserCredentials $userCredentials,
        string $xmlDetails = 'Full'
    ) {
        $this->sourceCredentials = $sourceCredentials;
        $this->userCredentials   = $userCredentials;
        $this->xmlDetails        = $xmlDetails;
    }

}
