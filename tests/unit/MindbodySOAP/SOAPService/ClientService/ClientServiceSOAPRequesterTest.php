<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Unit\MindbodySOAP\SOAPService\ClientService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\ClientServiceSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Factory\GetClientServicesParamsRequestFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientPurchasesParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\ValidateLoginParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Request\GetProgramsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\SiteServiceSOAPRequester;
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

    public function testValidateLogin()
    {
        $clientServiceSOAPRequester = $this->getClientServiceSoapRequester();

        $response = $clientServiceSOAPRequester->validateLogin(
            new ValidateLoginParamsRequest(
                $this->getTestUsername(),
                $this->getTestUserPassword()
            )
        );

        $this->addToAssertionCount(1);
    }

    public function testGetClientServices()
    {
        $clientServiceSOAPRequester = $this->getClientServiceSoapRequester();
        $siteRequester              = $this->getSiteServiceSoapRequester();

        $programResponse = $siteRequester->getPrograms(new GetProgramsParamsRequest());

        $response = $clientServiceSOAPRequester->getClientServices(
            GetClientServicesParamsRequestFactory::createFromPrograms(
                $this->getClientWithPurchasesId(),
                $programResponse->getPrograms()
            )
        );

        $this->addToAssertionCount(1);
    }

    public function testGetClientPurchases()
    {
        $clientServiceSOAPRequester = $this->getClientServiceSoapRequester();
        $params                     = new GetClientPurchasesParamsRequest($this->getClientWithPurchasesId());
        $params->setStartDate(new \DateTimeImmutable('2000-01-01'));
        $result = $clientServiceSOAPRequester->getClientPurchases($params);

        $this->addToAssertionCount(1);
    }

    public function testUpdatePassword()
    {
        $clientServiceSOAPRequester = $this->getClientServiceSoapRequester();

        $response = $clientServiceSOAPRequester->addOrUpdateClient(
            new AddOrUpdateClientsParamsRequest(
                [
                    (new Client($this->getTestUserId()))
                        ->setUsername($this->getTestUsername())
                        ->setPassword('newpassword123'),
                ]
            )
        );

        $this->addToAssertionCount(1);
    }

    public function testGetClientById()
    {
        $clientServiceSOAPRequester = $this->getClientServiceSoapRequester();
        $params                     = new GetClientsParamsRequest();
        $params->setClientIds([$this->getTestUserId()]);

        $response = $clientServiceSOAPRequester->getClients($params);

        $this->assertEquals($this->getTestUserId(), $response->getClients()[0]->getId());
    }

    private function getClientServiceSoapRequester()
    {
        return new ClientServiceSOAPRequester(
            $this->getMindbodySoapRequester(),
            $this->getMindbodySerializer()
        );
    }

    private function getSiteServiceSoapRequester()
    {
        return new SiteServiceSOAPRequester(
            $this->getMindbodySoapRequester(),
            $this->getMindbodySerializer()
        );
    }
}
