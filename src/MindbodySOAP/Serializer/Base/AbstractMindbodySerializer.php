<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Base;

use JMS\Serializer\SerializerInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestParamsInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\UserCredentials;

abstract class AbstractMindbodySerializer
{
    protected const DESERIALIZABLE_CLASS = '';

    /** @var SerializerInterface */
    private $serializer;

    /** @var string */
    private $format;

    public function __construct(SerializerInterface $serializer, string $format = 'xml')
    {
        $this->serializer = $serializer;
        $this->format     = $format;
    }

    public function deserialize($data)
    {
        return $this->serializer->deserialize($data, static::DESERIALIZABLE_CLASS, $this->format);
    }

    public function abstractSerialize($data): string
    {
        return $this->serializer->serialize($data, $this->format);
    }

    abstract public function serialize(
        RequestParamsInterface $requestParams,
        SourceCredentials $sourceCredentials,
        ?UserCredentials $userCredentials = null
    ): string;

    abstract public function getSoapMethodName(): string;
}
