<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Deserializer;

use JMS\Serializer\SerializerInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Exception\MindbodyDeserializerException;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\SOAPMethodResultInterface;
use Throwable;

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
        try {
            /** @var SOAPMethodResultInterface $soapMethodResultInstance */
            $soapMethodResultInstance = new $soapMethodResultClass();

            $xml = simplexml_load_string($content);
            $xml->registerXPathNamespace('result', 'http://clients.mindbodyonline.com/api/0_5_1');
            $output = $xml->xpath('//result:' . $soapMethodResultInstance->getMethodName() . 'Result');

            $newXml = $output[0]->asXML();

            /** @var AbstractBaseResultResponse $result */
            $result = $this->serializer->deserialize($newXml, $soapMethodResultClass, $format);
            $result->setPayload($content);

            return $result;
        } catch (Throwable $exception) {
            throw MindbodyDeserializerException::create($content, $exception);
        }
    }
}
