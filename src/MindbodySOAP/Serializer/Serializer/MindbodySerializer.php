<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Serializer;

use JMS\Serializer\SerializerInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Deserializer\MindbodyDeserializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory\EnvelopeRequestFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\Request;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestParamsInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\UserCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\SOAPMethodResultInterface;

class MindbodySerializer
{
    /** @var SerializerInterface */
    protected $serializer;

    /** @var MindbodyDeserializer */
    protected $deserializer;

    /** @var SourceCredentials */
    private $sourceCredentials;

    /** @var UserCredentials|null */
    private $userCredentials;

    /** @var string */
    private $format;

    public function __construct(
        SerializerInterface $serializer,
        MindbodyDeserializer $deserializer,
        SourceCredentials $sourceCredentials,
        ?UserCredentials $userCredentials = null,
        string $format = 'xml'
    ) {
        $this->serializer        = $serializer;
        $this->deserializer      = $deserializer;
        $this->sourceCredentials = $sourceCredentials;
        $this->userCredentials   = $userCredentials;
        $this->format            = $format;
    }

    public function serialize(string $requestClass, RequestParamsInterface $requestParams): string
    {
        $envelope = EnvelopeRequestFactory::create(
            new $requestClass(new Request($this->sourceCredentials, $requestParams, $this->userCredentials))
        );

        return $this->serializer->serialize($envelope, $this->format);
    }

    public function deserialize(string $soapMethodResultClass, string $data): SOAPMethodResultInterface
    {
        return $this->deserializer->deserialize($data, $soapMethodResultClass, $this->format);
    }
}
