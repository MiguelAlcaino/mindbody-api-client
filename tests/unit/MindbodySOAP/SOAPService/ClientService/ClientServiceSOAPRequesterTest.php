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
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\ValidateLoginParamsRequest;
use MiguelAlcainoTest\MindbodyApiClient\Unit\MindbodySOAP\Helper\MindbodySerializerTestTrait;
use PHPUnit\Framework\TestCase;

class ClientServiceSOAPRequesterTest extends TestCase
{
    use MindbodySerializerTestTrait;

    public function testAddOrUpdateClient()
    {
        $clientServiceSOAPRequester = $this->getClientServiceSoapRequester();

        $response = $clientServiceSOAPRequester->addOrUpdateClient(
            new AddOrUpdateClientsParamsRequest(
                [
                    (new Client($this->getTestUserId()))->setPromotionalEmailOptIn(false),
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

    public function testValidateLogin(){
        $clientServiceSOAPRequester = $this->getClientServiceSoapRequester();

        $response = $clientServiceSOAPRequester->validateLogin(new ValidateLoginParamsRequest($this->getTestUsername(), $this->getTestUserPassword()));

        $this->addToAssertionCount(1);
    }

    private function getClientServiceSoapRequester()
    {
        return new ClientServiceSOAPRequester(
            $this->getMindbodySoapRequester(),
            $this->getMindbodySerializer()
        );
    }
}
