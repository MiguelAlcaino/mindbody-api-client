<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Unit\MindbodySOAPRequest\Decoder\ClientService;

use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\SerializerBuilder;
use MiguelAlcaino\MindbodyApiClient\EventSubscriber\BodyRequestPostSerializeSubscriber;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\ClientService\AddOrUpdateClientsSerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\UserCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsParamsRequest;
use PHPUnit\Framework\TestCase;

class AddOrUpdateClientsDecoderTest extends TestCase
{

    public function testSerialize()
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
            new AddOrUpdateClientsParamsRequest(
                [
                    (new Client('12312321'))->setPromotionalEmailOptIn(true),
                ]
            ),
            new SourceCredentials('xxx', 'yyy', [12, 23]),
            new UserCredentials('zzz', 'uuu', [12, 23])
        );

        $this->addToAssertionCount(1);
    }
}
