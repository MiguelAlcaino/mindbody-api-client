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
     * @throws GuzzleException
     */
    public function request(string $uri, string $methodName, string $body): string
    {
        $result = $this->guzzleClient->request(
            'POST',
            $uri,
            [
                'body'    => $body,
                'headers' => [
                    'Content-Type' => 'text/xml; charset=utf-8',
                    'SOAPAction'   => "http://clients.mindbodyonline.com/api/0_5_1/{$methodName}",
                    'Host'         => self::HEADER_HOST,
                ],
            ]
        );

        return $result->getBody()->getContents();
    }
}
