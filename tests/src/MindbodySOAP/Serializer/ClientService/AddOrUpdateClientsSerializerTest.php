<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Unit\MindbodySOAP\Serializer\ClientService;

use JMS\Serializer\SerializerBuilder;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\ClientService\AddOrUpdateClientsSerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\UserCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsParamsRequest;
use PHPUnit\Framework\TestCase;

class AddOrUpdateClientsSerializerTest extends TestCase
{

    public function testSerialize()
    {
        $serializer = SerializerBuilder::create()
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
