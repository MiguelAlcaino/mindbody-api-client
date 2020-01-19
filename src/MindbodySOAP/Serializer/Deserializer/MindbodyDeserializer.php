<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Deserializer;

use JMS\Serializer\SerializerInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\SOAPMethodResultInterface;

class MindbodyDeserializer
{
    /** @var SerializerInterface */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function deserialize(string $content, string $soapMethodResultClass, string $format = 'xml'): SOAPMethodResultInterface
    {
        /** @var SOAPMethodResultInterface $soapMethodResultInstance */
        $soapMethodResultInstance = new $soapMethodResultClass();

        $xml = simplexml_load_string($content);
        $xml->registerXPathNamespace('result', 'http://clients.mindbodyonline.com/api/0_5_1');
        $output = $xml->xpath('//result:' . $soapMethodResultInstance->getMethodName() . 'Result');

        $newXml = $output[0]->asXML();

        return $this->serializer->deserialize($newXml, $soapMethodResultClass, $format);
    }
}
