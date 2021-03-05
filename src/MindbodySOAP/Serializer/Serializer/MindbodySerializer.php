<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Serializer;

use JMS\Serializer\SerializerInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Deserializer\MindbodyDeserializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Exception\MindbodySerializerException;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory\EnvelopeRequestFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractSOAPMethod;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\SOAPMethodResultInterface;
use Throwable;

class MindbodySerializer
{
    /** @var SerializerInterface */
    protected $serializer;

    /** @var MindbodyDeserializer */
    protected $deserializer;

    /** @var string */
    private $format;

    public function __construct(
        SerializerInterface $serializer,
        MindbodyDeserializer $deserializer,
        string $format = 'xml'
    ) {
        $this->serializer   = $serializer;
        $this->deserializer = $deserializer;
        $this->format       = $format;
    }

    public function serialize(AbstractSOAPMethod $requestCredentials): string
    {
        $envelope = EnvelopeRequestFactory::create($requestCredentials);
        try {
            return $this->serializer->serialize($envelope, $this->format);
        } catch (Throwable $exception) {
            throw MindbodySerializerException::createFromEnvelopeRequest($envelope, $exception);
        }
    }

    public function deserialize(string $soapMethodResultClass, string $data): SOAPMethodResultInterface
    {
        return $this->deserializer->deserialize($data, $soapMethodResultClass, $this->format);
    }
}
