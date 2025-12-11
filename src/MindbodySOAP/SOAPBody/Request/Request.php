<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

class Request
{
    #[Serializer\SerializedName("SourceCredentials")]
    private $sourceCredentials;

    #[Serializer\XmlList(inline: true)]
    #[Serializer\SkipWhenEmpty]
    private RequestParamsInterface $requestParams;

    #[Serializer\SerializedName("UserCredentials")]
    #[Serializer\SkipWhenEmpty]
    private $userCredentials;

    #[Serializer\SerializedName("XMLDetail")]
    #[Serializer\XmlElement(cdata: false)]
    private string $xmlDetails;

    public function __construct(
        SourceCredentials $sourceCredentials,
        ?RequestParamsInterface $requestParams = null,
        ?UserCredentials $userCredentials = null,
        string $xmlDetails = 'Full'
    ) {
        $this->sourceCredentials = $sourceCredentials;
        $this->requestParams     = $requestParams;
        $this->userCredentials   = $userCredentials;
        $this->xmlDetails        = $xmlDetails;
    }
}
