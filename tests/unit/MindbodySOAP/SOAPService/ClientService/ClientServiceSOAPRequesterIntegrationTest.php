<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodySOAP\SOAPService\ClientService;

use DateTimeImmutable;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\MindbodySOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\ClientServiceSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientVisitsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\ValidateLoginParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\SiteServiceSOAPRequester;
use MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodySOAP\Helper\MindbodyUtilsTrait;
use PHPUnit\Framework\TestCase;

class ClientServiceSOAPRequesterIntegrationTest extends TestCase
{
    use MindbodyUtilsTrait;

    public function testClientService(): void
    {
        $clientServiceSOAPRequester = $this->getClientServiceSoapRequester(true);

        $email    = sprintf('alfonso%s@pacheco.com', uniqid('', true));
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
            ->setBirthday(new DateTimeImmutable('1988-09-09 11:11:11'))
            ->setEmail($email)
            ->setReferredBy('Manolito');

        $newClientParamsRequest = new AddOrUpdateClientsParamsRequest(
            [
                $newClient,
            ],
        );

        // Add a new client to Mindbody
        $response = $clientServiceSOAPRequester->addOrUpdateClient($newClientParamsRequest);
        $clients  = $response->getClients();
        self::assertCount(1, $clients);

        $newClient = $clients[0];

        self::assertEquals('Alfonso', $newClient->getFirstName());
        self::assertEquals(false, $newClient->isPromotionalEmailOptIn());

        // Opt-in Promo emails

        $request = new AddOrUpdateClientsParamsRequest(
            [
                (new Client($newClient->getId()))->setPromotionalEmailOptIn(true),
            ],
        );

        $response = $clientServiceSOAPRequester->addOrUpdateClient($request);

        $clients = $response->getClients();

        self::assertCount(1, $clients);
        self::assertEquals(true, $clients[0]->isPromotionalEmailOptIn());

        // Get full list of clients in Mindbody
        $response = $clientServiceSOAPRequester->getClients(
            (new GetClientsParamsRequest())->setPageSize(2)->setCurrentPageIndex(0),
        );

        $clients = $response->getClients();

        self::assertCount(2, $clients);

        // Test user login
        $client = $this->testLogin($clientServiceSOAPRequester, $email, $password);

        // Find a client by its ID
        $params = new GetClientsParamsRequest();
        $params->setClientIds([$client->getId()]);

        $response = $clientServiceSOAPRequester->getClients($params);

        self::assertEquals($client->getId(), $response->getClients()[0]->getId());

        $newPassword = 'BailecitoBienMeneao12';

        // Update client's password
        $response = $clientServiceSOAPRequester->addOrUpdateClient(
            new AddOrUpdateClientsParamsRequest(
                [
                    (new Client($client->getId()))
                        ->setUsername($email)
                        ->setPassword($newPassword),
                ],
            ),
        );

        $clients = $response->getClients();
        self::assertCount(1, $clients);
        self::assertEquals($email, $clients[0]->getEmail());

        // Login with new password
        $this->testLogin($clientServiceSOAPRequester, $email, $newPassword);
    }

    private function testLogin(ClientServiceSOAPRequester $clientServiceSOAPRequester, string $email, string $password): Client
    {
        $response = $clientServiceSOAPRequester->validateLogin(
            new ValidateLoginParamsRequest(
                $email,
                $password,
            ),
        );

        $client = $response->getClient();
        self::assertEquals($email, $client->getEmail());

        return $client;
    }

    public function testClientVisitsWithMockedResponse(): void
    {
        $mock                       = new MockHandler(
            [
                new Response(200, [], $this->getClientVisitsResponseBody()),
            ],
        );
        $handlerStack               = HandlerStack::create($mock);
        $guzzleClient               = new \GuzzleHttp\Client(['handler' => $handlerStack]);
        $clientServiceSOAPRequester = $this->getClientServiceSoapRequester(true, $guzzleClient);

        $requestParams = new GetClientVisitsParamsRequest('FAKE_CLIENT_ID');
        // Not setting parameters as the response is mocked
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

    private function getClientServiceSoapRequester($useFreeSite = true, ?\GuzzleHttp\Client $guzzleClient = null): ClientServiceSOAPRequester
    {
        return new ClientServiceSOAPRequester(
            new MindbodySOAPRequester($guzzleClient),
            $this->getMindbodySerializer(),
            $this->getSourceCredentials($useFreeSite),
            $this->getUserCredentials($useFreeSite),
        );
    }

    private function getSiteServiceSoapRequester(): SiteServiceSOAPRequester
    {
        return new SiteServiceSOAPRequester(
            new MindbodySOAPRequester(),
            $this->getMindbodySerializer(),
            $this->getSourceCredentials(),
            $this->getUserCredentials(),
        );
    }

    private function getClientVisitsResponseBody(): string
    {
        return file_get_contents(__DIR__ . '/../../../Resources/mindbody_responses/GetClientVisitsResponse.xml');
    }
}
