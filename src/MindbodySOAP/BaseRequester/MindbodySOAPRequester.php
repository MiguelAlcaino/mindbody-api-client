<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester;

use GuzzleHttp\Client;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Base\AbstractMindbodySerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory\SourceCredentialsFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory\UserCredentialsFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestParamsInterface;
use SimpleXMLElement;
use Spatie\ArrayToXml\ArrayToXml;

class MindbodySOAPRequester
{
    private const METHOD_XMNLS = 'http://clients.mindbodyonline.com/api/0_5_1';
    private const HEADER_HOST  = 'api.mindbodyonline.com';

    /** @var Client */
    private $guzzleClient;

    /** @var SourceCredentialsFactory */
    private $sourceCredentialsFactory;

    /** @var UserCredentialsFactory */
    private $userCredentialsFactory;

    public function __construct(
        SourceCredentialsFactory $sourceCredentialsFactory,
        UserCredentialsFactory $userCredentialsFactory,
        ?Client $guzzleClient = null
    ) {
        $this->sourceCredentialsFactory = $sourceCredentialsFactory;
        $this->userCredentialsFactory   = $userCredentialsFactory;
        $this->guzzleClient             = $guzzleClient ?? new Client();
    }

    public function createAndExecuteRequest(
        string $uri,
        RequestParamsInterface $requestParams,
        AbstractMindbodySerializer $mindbodySerializer,
        bool $useUserCredentials = true
    ) {
        $userCredentials = $useUserCredentials ? $this->userCredentialsFactory->create() : null;

        $body = $mindbodySerializer->serialize(
            $requestParams,
            $this->sourceCredentialsFactory->create(),
            $userCredentials
        );

        return $this->executeRequest($uri, $mindbodySerializer->getSoapMethodName(), $body);
    }

    public function createEnvelopeAndExecuteRequest(
        string $uri,
        string $methodName,
        array $requestReplacement = [],
        bool $useUserCredentials = true
    ): array {
        $body = $this->createEnvelope($methodName, $requestReplacement, $useUserCredentials);

        return $this->executeRequest($uri, $methodName, $body);
    }

    private function executeRequest(string $uri, string $methodName, string $body): array
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

        $response = $result->getBody()->getContents();

        $xml    = new SimpleXMLElement($response);
        $output = $xml->xpath('//soap:Body')[0];

        return json_decode(json_encode((array)$output), true)["{$methodName}Response"];
    }

    private function createEnvelope(string $methodName, array $requestReplacement = [], bool $useUserCredentials = true): string
    {
        $rootNode = [
            'rootElementName' => 'soapenv:Envelope',
            '_attributes'     => [
                'xmlns:xsd'     => 'http://www.w3.org/2001/XMLSchema',
                'xmlns:soapenv' => 'http://schemas.xmlsoap.org/soap/envelope/',
                'xmlns:xsi'     => 'http://www.w3.org/2001/XMLSchema-instance',
            ],
        ];

        $request = [
            'SourceCredentials' => [
                'SourceName' => $this->mindbodyCredentials->getSourceName(),
                'Password'   => $this->mindbodyCredentials->getSourcePassword(),
                'SiteIDs'    => [
                    'int' => $this->mindbodyCredentials->getSiteIds(),
                ],
            ],
        ];

        if ($useUserCredentials) {
            $request['UserCredentials'] = [
                'Username' => $this->mindbodyCredentials->getAdminUser(),
                'Password' => $this->mindbodyCredentials->getAdminPassword(),
                'SiteIDs'  => [
                    'int' => $this->mindbodyCredentials->getSiteIds(),
                ],
            ];
        }

        $request['XMLDetail'] = 'Full';

        $request = array_merge($request, $requestReplacement);

        $envelope = [
            'soapenv:Body' => [
                $methodName => [
                    '_attributes' => [
                        'xmlns' => self::METHOD_XMNLS,
                    ],
                    'Request'     => $request,
                ],
            ],
        ];

        $envelope = ArrayToXml::convert($envelope, $rootNode);

        return $envelope;
    }

}
