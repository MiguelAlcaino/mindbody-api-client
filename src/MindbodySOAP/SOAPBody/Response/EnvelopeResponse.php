<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlNamespace(uri: "http://schemas.xmlsoap.org/soap/envelope/", prefix: "soap")]
#[Serializer\XmlNamespace(uri: "http://www.w3.org/2001/XMLSchema-instance", prefix: "xsi")]
#[Serializer\XmlNamespace(uri: "http://www.w3.org/2001/XMLSchema", prefix: "xsd")]
#[Serializer\XmlRoot("soap:Envelope")]
class EnvelopeResponse
{
    #[Serializer\SerializedName("soap:Body")]
    private bodyresponse $body;

    public function __construct(BodyResponse $body)
    {
        $this->body = $body;
    }
}
