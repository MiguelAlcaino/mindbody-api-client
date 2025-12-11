<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlNamespace(uri: 'http://clients.mindbodyonline.com/api/0_5_1')]
class RequestContainer
{
    #[Serializer\SerializedName("Request")]
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

}
