<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Factory;

use JMS\Serializer\SerializerInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Base\AbstractMindbodySerializer;

class MindbodySerializerFactory
{
    /** @var SerializerInterface */
    private $jmsSerializer;

    /** @var string */
    private $mindbodySerializerClass;

    public function __construct(SerializerInterface $jmsSerializer, string $mindbodySerializerClass)
    {
        $this->jmsSerializer           = $jmsSerializer;
        $this->mindbodySerializerClass = $mindbodySerializerClass;
    }

    public function create(): AbstractMindbodySerializer
    {
        return new $this->mindbodySerializerClass($this->jmsSerializer);
    }
}
