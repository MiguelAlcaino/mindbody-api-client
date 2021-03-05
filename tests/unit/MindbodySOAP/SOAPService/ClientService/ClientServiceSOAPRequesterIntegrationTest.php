<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodySOAP\SOAPService\ClientService;

use Codeception\Specify;
use Codeception\Test\Unit;
use DateTimeImmutable;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\MindbodySOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\ClientServiceSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Factory\GetClientServicesParamsRequestFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientPurchasesParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientVisitsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\ValidateLoginParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Request\GetProgramsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\SiteServiceSOAPRequester;
use MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodySOAP\Helper\MindbodyUtilsTrait;

class ClientServiceSOAPRequesterIntegrationTest extends Unit
{
    use MindbodyUtilsTrait;
    use Specify;

    public function testClientService()
    {
        $clientServiceSOAPRequester = $this->getClientServiceSoapRequester(true);

        $email    = sprintf('alfonso%s@pacheco.com', uniqid());
        $password = 'RandomBailecito2020';

        $newClient = new Client();
        $newClient
            ->setUsername($email)
            ->setPassword($password)
            ->setFirstName('Alfonso')
            ->setLastName('Pacheco')
            ->setAddressLine1('Wansee str 12')
            ->setCity('London')
            ->setState('London')
            ->setPostalCode('12345')
            ->setMobilePhone('2132132132')
            ->setBirthday(new \DateTimeImmutable('1988-09-09 11:11:11'))
            ->setEmail($email)
            ->setReferredBy('Manolito');

        $newClientParamsRequest = new AddOrUpdateClientsParamsRequest(
            [
                $newClient,
            ]
        );

        $this->specify(
            'Add a new client to Mindbody',
            function () use (&$newClient, $clientServiceSOAPRequester, $newClientParamsRequest) {
                $response = $clientServiceSOAPRequester->addOrUpdateClient($newClientParamsRequest);
                $clients  = $response->getClients();
                self::assertCount(1, $clients);

                $newClient = $clients[0];

                self::assertEquals('Alfonso', $newClient->getFirstName());
                self::assertEquals(false, $newClient->isPromotionalEmailOptIn());
            }
        );

        $this->specify(
            'Opt-in Promo emails',
            function () use ($newClient, $clientServiceSOAPRequester) {
                $request = new AddOrUpdateClientsParamsRequest(
                    [
                        (new Client($newClient->getId()))->setPromotionalEmailOptIn(true),
                    ]
                );

                $response = $clientServiceSOAPRequester->addOrUpdateClient($request);

                $clients = $response->getClients();

                self::assertCount(1, $clients);
                self::assertEquals(true, $clients[0]->isPromotionalEmailOptIn());
            }
        );

        $this->specify(
            'Get full list of clients in Mindbody',
            function () use ($clientServiceSOAPRequester) {
                $response = $clientServiceSOAPRequester->getClients(
                    (new GetClientsParamsRequest())->setPageSize(2)->setCurrentPageIndex(0)
                );

                $clients = $response->getClients();

                self::assertCount(2, $clients);
            }
        );

        $client = null;
        $this->specify(
            'Test user login',
            function () use (&$client, $clientServiceSOAPRequester, $email, $password) {
                $client = $this->testLogin($clientServiceSOAPRequester, $email, $password);
            }
        );

        $this->specify(
            'Find a client by its ID',
            function () use ($clientServiceSOAPRequester, $client) {
                $params = new GetClientsParamsRequest();
                $params->setClientIds([$client->getId()]);

                $response = $clientServiceSOAPRequester->getClients($params);

                self::assertEquals($client->getId(), $response->getClients()[0]->getId());
            }
        );

        $newPassword = 'BailecitoBienMeneao12';

        $this->specify(
            'Update client\'s password',
            function () use ($clientServiceSOAPRequester, $email, $newPassword, $client) {
                $response = $clientServiceSOAPRequester->addOrUpdateClient(
                    new AddOrUpdateClientsParamsRequest(
                        [
                            (new Client($client->getId()))
                                ->setUsername($email)
                                ->setPassword($newPassword),
                        ]
                    )
                );

                $clients = $response->getClients();
                self::assertCount(1, $clients);
                self::assertEquals($email, $clients[0]->getEmail());
            }
        );

        $this->specify(
            'Login with new password',
            function () use ($clientServiceSOAPRequester, $email, $newPassword) {
                $this->testLogin($clientServiceSOAPRequester, $email, $newPassword);
            }
        );
    }

    private function testLogin(ClientServiceSOAPRequester $clientServiceSOAPRequester, string $email, string $password): Client
    {
        $response = $clientServiceSOAPRequester->validateLogin(
            new ValidateLoginParamsRequest(
                $email,
                $password
            )
        );

        $client = $response->getClient();
        self::assertEquals($email, $client->getEmail());

        return $client;
    }

    public function testClientVisitsWithMockedResponse()
    {
        $mock                       = new MockHandler(
            [
                new Response(200, [], $this->getClientVisitsResponseBody()),
            ]
        );
        $handlerStack               = HandlerStack::create($mock);
        $guzzleClient               = new \GuzzleHttp\Client(['handler' => $handlerStack]);
        $clientServiceSOAPRequester = $this->getClientServiceSoapRequester(true, $guzzleClient);

        $requestParams = new GetClientVisitsParamsRequest('FAKE_CLIENT_ID');
        //Not setting parameters as the response is mocked
        $result = $clientServiceSOAPRequester->getClientVisits($requestParams);

        $visits = $result->getVisits();
        self::assertCount(1, $visits);
        $visit = $visits[0];
        self::assertEquals('364563', $visit->getId());
        self::assertEquals('33609', $visit->getClassId());
        self::assertEquals('0', $visit->getAppointmentId());
        self::assertNotNull($visit->getStartDateTime());
        self::assertEquals(false, $visit->getLateCancelled());
        self::assertNotNull($visit->getEndDateTime());
        self::assertEquals('Ride', $visit->getName());
        self::assertEquals(false, $visit->getWebSignup());
        self::assertEquals(false, $visit->getSignedIn());
        self::assertEquals(false, $visit->getMakeUp());
    }

    // public function testGetClientServices()
    // {
    //     $clientServiceSOAPRequester = $this->getClientServiceSoapRequester();
    //     $siteRequester              = $this->getSiteServiceSoapRequester();
    //
    //     $programResponse = $siteRequester->getPrograms(new GetProgramsParamsRequest());
    //
    //     $response = $clientServiceSOAPRequester->getClientServices(
    //         GetClientServicesParamsRequestFactory::createFromPrograms(
    //             $this->getClientWithPurchasesId(),
    //             $programResponse->getPrograms()
    //         )
    //     );
    //
    //     $this->addToAssertionCount(1);
    // }

    // public function testGetClientPurchases()
    // {
    //     $clientServiceSOAPRequester = $this->getClientServiceSoapRequester();
    //     $params                     = new GetClientPurchasesParamsRequest($this->getClientWithPurchasesId());
    //     $params->setStartDate(new DateTimeImmutable('2000-01-01'));
    //     $result = $clientServiceSOAPRequester->getClientPurchases($params);
    //
    //     $this->addToAssertionCount(1);
    // }

    private function getClientServiceSoapRequester($useFreeSite = true, \GuzzleHttp\Client $guzzleClient = null)
    {
        return new ClientServiceSOAPRequester(
            new MindbodySOAPRequester($guzzleClient),
            $this->getMindbodySerializer(),
            $this->getSourceCredentials($useFreeSite),
            $this->getUserCredentials($useFreeSite)
        );
    }

    private function getSiteServiceSoapRequester()
    {
        return new SiteServiceSOAPRequester(
            new MindbodySOAPRequester(),
            $this->getMindbodySerializer(),
            $this->getSourceCredentials(),
            $this->getUserCredentials()
        );
    }

    private function getClientVisitsResponseBody(): string
    {
        return file_get_contents(__DIR__ . '/../../../Resources/mindbody_responses/GetClientVisitsResponse.xml');
    }
}
