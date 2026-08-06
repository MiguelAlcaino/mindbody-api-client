<?php

declare(strict_types=1);

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodyREST\BaseRequester;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\MindbodyRESTRequester;
use PHPUnit\Framework\TestCase;

/**
 * Mindbody's base host already ends with a slash, so an endpoint path that also starts with
 * one produced URLs such as "https://api.mindbodyonline.com/public/v6//class/classvisits".
 * The requester now joins host and path defensively, whatever slashes either side carries.
 */
class MindbodyRESTRequesterTest extends TestCase
{
    /** @var array<int, array<string, mixed>> */
    private array $transactions = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->transactions = [];
    }

    public function testJoinsEndpointPathWithLeadingSlashWithoutDoublingIt(): void
    {
        $requester = new MindbodyRESTRequester('FAKE_API_KEY', $this->createGuzzleClient());

        $requester->request('GET', '/class/classvisits', '{"classId":61768}', 564676);

        $this->assertSame(
            'https://api.mindbodyonline.com/public/v6/class/classvisits?classId=61768',
            $this->getRequestedUrl(),
        );
    }

    public function testKeepsSingleSlashForEndpointPathWithoutLeadingSlash(): void
    {
        $requester = new MindbodyRESTRequester('FAKE_API_KEY', $this->createGuzzleClient());

        $requester->request('GET', 'class/classvisits', '{"classId":61768}', 564676);

        $this->assertSame(
            'https://api.mindbodyonline.com/public/v6/class/classvisits?classId=61768',
            $this->getRequestedUrl(),
        );
    }

    public function testKeepsQueryStringThatIsPartOfTheEndpointPath(): void
    {
        $requester = new MindbodyRESTRequester('FAKE_API_KEY', $this->createGuzzleClient());

        $requester->request('POST', 'class/removeFromWaitlist?WaitlistEntryIds=99', '{}', 564676);

        $this->assertSame(
            'https://api.mindbodyonline.com/public/v6/class/removeFromWaitlist?WaitlistEntryIds=99',
            $this->getRequestedUrl(),
        );
    }

    public function testJoinsCustomApiHostEndingWithASlash(): void
    {
        $requester = new MindbodyRESTRequester(
            'FAKE_API_KEY',
            $this->createGuzzleClient(),
            'https://sandbox.mindbodyonline.com/public/v6/',
        );

        $requester->request('POST', '/usertoken/issue', '{"Username":"user"}', 564676);

        $this->assertSame(
            'https://sandbox.mindbodyonline.com/public/v6/usertoken/issue',
            $this->getRequestedUrl(),
        );
    }

    public function testJoinsCustomApiHostNotEndingWithASlash(): void
    {
        $requester = new MindbodyRESTRequester(
            'FAKE_API_KEY',
            $this->createGuzzleClient(),
            'https://sandbox.mindbodyonline.com/public/v6',
        );

        $requester->request('POST', 'usertoken/issue', '{"Username":"user"}', 564676);

        $this->assertSame(
            'https://sandbox.mindbodyonline.com/public/v6/usertoken/issue',
            $this->getRequestedUrl(),
        );
    }

    private function createGuzzleClient(): Client
    {
        $handlerStack = HandlerStack::create(new MockHandler([new Response(200, [], '{}')]));
        $handlerStack->push(Middleware::history($this->transactions));

        return new Client(['handler' => $handlerStack]);
    }

    private function getRequestedUrl(): string
    {
        $this->assertCount(1, $this->transactions);

        return (string)$this->transactions[0]['request']->getUri();
    }
}
