<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Unit\MindbodySOAPRequest\Decoder\ClientService;

use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\SerializerBuilder;
use MiguelAlcaino\MindbodyApiClient\EventSubscriber\BodyRequestPostSerializeSubscriber;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\ClientService\AddOrUpdateClientsSerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\UserCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsRequest;
use PHPUnit\Framework\TestCase;

class AddOrUpdateClientsDecoderTest extends TestCase
{

    public function testDeserialize()
    {
        $serializer = SerializerBuilder::create()
            ->configureListeners(
                static function (EventDispatcher $dispatcher) {
                    $dispatcher->addSubscriber(new BodyRequestPostSerializeSubscriber());
                }
            )
            ->build();

        $serializer = new AddOrUpdateClientsSerializer($serializer);

        $xml = $serializer->serialize(
            new AddOrUpdateClientsRequest(),
            new SourceCredentials('xxx', 'yyy', [12]),
            new UserCredentials('zzz', 'uuu', [12])
        );

        $this->addToAssertionCount(1);
    }
}
