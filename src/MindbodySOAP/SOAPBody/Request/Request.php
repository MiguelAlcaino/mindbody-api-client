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
     * @var RequestParamsInterface
     * @Serializer\XmlList(inline=true)
     */
    private $requestParams;

    /**
     * @var UserCredentials
     * @Serializer\SerializedName("UserCredentials")
     * @Serializer\SkipWhenEmpty()
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
        RequestParamsInterface $requestParams,
        ?UserCredentials $userCredentials = null,
        string $xmlDetails = 'Full'
    ) {
        $this->sourceCredentials = $sourceCredentials;
        $this->requestParams     = $requestParams;
        $this->userCredentials   = $userCredentials;
        $this->xmlDetails        = $xmlDetails;
    }
}
