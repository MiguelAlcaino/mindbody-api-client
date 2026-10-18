<?php

declare(strict_types=1);

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodyREST\RESTEndpoint\Client\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use JMS\Serializer\SerializerBuilder;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\MindbodyRESTRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\RESTRequesterExecutor;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\ClientRESTRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request\GETClientPurchasesRequest;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

class GETClientPurchasesRequestTest extends TestCase
{
    /** @var array<int, array<string, mixed>> */
    private array $transactions = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->transactions = [];
    }

    public function testSendsNoAuthorizationHeaderWithoutStaffToken(): void
    {
        $request = (new GETClientPurchasesRequest(100012707))->setSiteId(564676);

        $this->createClientRequester()->getClientPurchases($request);

        $sentRequest = $this->getSentRequest();

        $this->assertFalse($sentRequest->hasHeader('authorization'));
        $this->assertStringContainsString('ClientId=100012707', $sentRequest->getUri()->getQuery());
    }

    public function testSendsStaffTokenAsAuthorizationHeaderWithoutLeakingItIntoTheQuery(): void
    {
        $request = (new GETClientPurchasesRequest(100012707))
            ->setUserStaffToken('staff-token')
            ->setSiteId(564676);

        $this->createClientRequester()->getClientPurchases($request);

        $sentRequest = $this->getSentRequest();

        $this->assertSame('staff-token', $sentRequest->getHeaderLine('authorization'));
        $this->assertStringNotContainsString('staff-token', $sentRequest->getUri()->getQuery());
    }

    private function createClientRequester(): ClientRESTRequester
    {
        $handlerStack = HandlerStack::create(new MockHandler([new Response(200, [], '{"Purchases":[]}')]));
        $handlerStack->push(Middleware::history($this->transactions));

        return new ClientRESTRequester(
            new RESTRequesterExecutor(
                new MindbodyRESTRequester('FAKE_API_KEY', new Client(['handler' => $handlerStack])),
                SerializerBuilder::create()->build(),
            ),
        );
    }

    private function getSentRequest(): RequestInterface
    {
        $this->assertCount(1, $this->transactions);

        return $this->transactions[0]['request'];
    }
}
