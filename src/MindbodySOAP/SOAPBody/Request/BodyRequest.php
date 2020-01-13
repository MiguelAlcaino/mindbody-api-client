<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlNamespace("http://clients.mindbodyonline.com/api/0_5_1")
 */
class BodyRequest
{
    /**
     * @var AbstractSOAPMethod
     * @Serializer\Exclude()
     */
    private $content;

    public function __construct(AbstractSOAPMethod $content)
    {
        $this->content = $content;
    }

    public function getContent(): AbstractSOAPMethod
    {
        return $this->content;
    }
}
