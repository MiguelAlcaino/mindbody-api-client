<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Factory;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

class JmsSerializerFactory
{
    public function create(): SerializerInterface
    {
        return SerializerBuilder::create()->build();
    }
}
