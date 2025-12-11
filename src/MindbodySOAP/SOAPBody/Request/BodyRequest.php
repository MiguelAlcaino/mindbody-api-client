<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

class BodyRequest
{
    /**
     * This attribute will be serialized as the SOAP method depending on the AbstractSOAPMethod instance that is injected here.
     * As $content is inline, it will not be added to the serialized string but its content will.
     */
    #[Serializer\XmlList(inline: true)]
    private AbstractSOAPMethod $content;

    public function __construct(AbstractSOAPMethod $content)
    {
        $this->content = $content;
    }
}
