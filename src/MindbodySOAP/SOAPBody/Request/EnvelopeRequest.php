<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlNamespace(uri: "http://schemas.xmlsoap.org/soap/envelope/", prefix: "soapenv")]
#[Serializer\XmlNamespace(uri: "http://www.w3.org/2001/XMLSchema-instance", prefix: "xsi")]
#[Serializer\XmlNamespace(uri: "http://www.w3.org/2001/XMLSchema", prefix: "xsd")]
#[Serializer\XmlRoot("soapenv:Envelope")]
class EnvelopeRequest
{
    #[Serializer\SerializedName("soapenv:Body")]
    private BodyRequest $body;

    public function __construct(BodyRequest $body)
    {
        $this->body = $body;
    }
}
