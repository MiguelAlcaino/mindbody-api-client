<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Query;

class MindbodyRESTRequester
{
    private const API_HOST = 'https://api.mindbodyonline.com/public/v6/';
    private string $apiKey;
    private ClientInterface $guzzleClient;
    private string $apiHost;

    public function __construct(string $apiKey, ClientInterface $guzzleClient, ?string $apiHost = null)
    {
        $this->apiKey       = $apiKey;
        $this->guzzleClient = $guzzleClient;
        $this->apiHost      = $apiHost ?? self::API_HOST;
    }

    /**
     * @param array<string, mixed> $newHeaders
     * @throws GuzzleException
     */
    public function request(
        string  $method,
        string  $endpointPath,
        string  $body,
        int     $siteId,
        ?string $staffUserToken = null,
        array   $newHeaders = []
    ): string
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Api-Key'      => $this->apiKey,
            'SiteId'       => $siteId,
        ];

        if (null !== $staffUserToken) {
            $headers['authorization'] = $staffUserToken;
        }

        $headers = array_merge($headers, $newHeaders);

        $options = ['headers' => $headers];

        if (strtoupper($method) === 'GET') {
            $options['query'] = Query::build(json_decode($body, true));
        } elseif (strtoupper($method) === 'POST') {
            $options['body'] = $body;
        }

        $result = $this->guzzleClient->request($method, $this->apiHost . $endpointPath, $options);

        return $result->getBody()->getContents();
    }
}
