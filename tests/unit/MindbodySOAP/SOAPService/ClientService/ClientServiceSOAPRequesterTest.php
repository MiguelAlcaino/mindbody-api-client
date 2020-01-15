<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Unit\MindbodySOAP\SOAPService\ClientService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\MindbodySOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory\SourceCredentialsFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory\UserCredentialsFactory;
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
            $this->getMindbodySoapRequester()
        );
    }

    private function getMindbodySoapRequester(): MindbodySOAPRequester
    {
        return new MindbodySOAPRequester(
            new SourceCredentialsFactory(
                'CrankGymDubai',
                'PUT PASSWORD HERE',
                [564676]
            ), new UserCredentialsFactory(
                'Miguelalcaino',
                'PUT PASSWORD HERE',
                [564676]
            )
        );
    }
}
