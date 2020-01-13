<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Unit\MindbodySOAP\SOAPService\ClientService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\MindbodySOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory\SourceCredentialsFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory\UserCredentialsFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\ClientServiceSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsParamsRequest;
use PHPUnit\Framework\TestCase;

class ClientServiceSOAPRequesterTest extends TestCase
{
    public function testGetClientServices()
    {
        $mindbodySoapRequester = new MindbodySOAPRequester(
            new SourceCredentialsFactory(
                '123',
                'xxx',
                [-99]
            ), new UserCredentialsFactory(
                '123',
                'yyy',
                [-99]
            )
        );

        $clientServiceSOAPRequester = new ClientServiceSOAPRequester(
            $mindbodySoapRequester
        );

        $response = $clientServiceSOAPRequester->addOrUpdateClient(
            new AddOrUpdateClientsParamsRequest(
                [
                    (new Client('12312321'))->setPromotionalEmailOptIn(true),
                ]
            )
        );

        $this->addToAssertionCount(1);
    }
}
