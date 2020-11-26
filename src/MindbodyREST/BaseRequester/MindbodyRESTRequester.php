<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class MindbodyRESTRequester
{
    private const API_HOST = 'https://api.mindbodyonline.com/public/v6/';
    private string $apiKey;
    private int    $siteId;
    private Client $guzzleClient;
    private string $apiHost;

    public function __construct(
        string $apiKey,
        int $siteId,
        Client $guzzleClient,
        string $apiHost = null
    ) {
        $this->apiKey       = $apiKey;
        $this->siteId       = $siteId;
        $this->guzzleClient = $guzzleClient;
        $this->apiHost      = $apiHost ?? self::API_HOST;
    }

    /**
     * @throws GuzzleException
     */
    public function request(
        string $method,
        string $endpointPath,
        string $body,
        ?string $staffUserToken = null,
        array $newHeaders = []
    ): string {
        $headers = [
            'Content-Type' => 'application/json',
            'Api-Key'      => $this->apiKey,
            'SiteId'       => $this->siteId,
        ];

        if (null !== $staffUserToken) {
            $headers['authorization'] = $staffUserToken;
        }

        $headers = array_merge($headers, $newHeaders);

        $result = $this->guzzleClient->request(
            $method,
            $this->apiHost . $endpointPath,
            [
                'body'    => $body,
                'headers' => $headers,
            ]
        );

        return $result->getBody()->getContents();
    }
}
