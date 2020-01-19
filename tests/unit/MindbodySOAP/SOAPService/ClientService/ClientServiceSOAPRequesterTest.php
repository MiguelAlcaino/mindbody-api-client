<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Unit\MindbodySOAP\SOAPService\ClientService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\MindbodySOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Deserializer\MindbodyDeserializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Factory\JmsSerializerFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Serializer\MindbodySerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\UserCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\ClientServiceSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientsParamsRequest;
use PHPUnit\Framework\TestCase;

class ClientServiceSOAPRequesterTest extends TestCase
{
    public function testAddOrUpdateClient()
    {
        $clientServiceSOAPRequester = $this->getClientServiceSoapRequester();

        $response = $clientServiceSOAPRequester->addOrUpdateClient(
            new AddOrUpdateClientsParamsRequest(
                [
                    (new Client('100000008'))->setPromotionalEmailOptIn(false),
                ]
            )
        );

        $this->addToAssertionCount(1);
    }

    public function testGetClients()
    {
        $clientServiceSOAPRequester = $this->getClientServiceSoapRequester();

        $response = $clientServiceSOAPRequester->getClients(
            (new GetClientsParamsRequest())->setPageSize(2)->setCurrentPageIndex(0)
        );

        $this->addToAssertionCount(1);
    }

    private function getClientServiceSoapRequester()
    {
        return new ClientServiceSOAPRequester(
            $this->getMindbodySoapRequester(),
            $this->getMindbodySerializer()
        );
    }

    public function getMindbodySerializer()
    {
        $jmsserializerFactory = new JmsSerializerFactory();
        $jmsSerializer        = $jmsserializerFactory->create();

        return new MindbodySerializer(
            $jmsSerializer,
            new MindbodyDeserializer($jmsSerializer),
            new SourceCredentials(
                'xxx',
                'xxx',
                [-99]
            ), new UserCredentials(
                'xxx',
                'xxx',
                [-99]
            )
        );
    }

    private function getMindbodySoapRequester(): MindbodySOAPRequester
    {
        return new MindbodySOAPRequester();
    }
}
