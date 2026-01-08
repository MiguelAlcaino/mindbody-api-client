<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class MindbodySOAPRequester
{
    private const HEADER_HOST = 'api.mindbodyonline.com';

    /** @var Client */
    private $guzzleClient;

    public function __construct(?Client $guzzleClient = null)
    {
        $this->guzzleClient = $guzzleClient ?? new Client();
    }

    /**
     * @param array<string, mixed> $newHeaders
     *
     * @throws GuzzleException
     */
    public function request(
        string $uri,
        string $methodName,
        string $body,
        array  $newHeaders = [],
    ): string {
        $headers = [
            'Content-Type' => 'text/xml; charset=utf-8',
            'SOAPAction'   => "http://clients.mindbodyonline.com/api/0_5_1/{$methodName}",
            'Host'         => self::HEADER_HOST,
        ];

        $headers = array_merge($headers, $newHeaders);

        $result  = $this->guzzleClient->request(
            'POST',
            $uri,
            [
                'body'    => $body,
                'headers' => $headers,
            ],
        );

        return $result->getBody()->getContents();
    }
}
