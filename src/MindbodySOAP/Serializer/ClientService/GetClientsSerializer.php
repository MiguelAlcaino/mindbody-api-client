<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\ClientService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Base\AbstractMindbodySerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory\EnvelopeRequestFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\Request;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestParamsInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\UserCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\EnvelopeResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientsRequest;

class GetClientsSerializer extends AbstractMindbodySerializer
{
    public const DESERIALIZABLE_CLASS = EnvelopeResponse::class;

    public function serialize(
        RequestParamsInterface $requestParams,
        SourceCredentials $sourceCredentials,
        ?UserCredentials $userCredentials = null
    ): string {
        $envelope = EnvelopeRequestFactory::create(
            new GetClientsRequest(new Request($sourceCredentials, $requestParams, $userCredentials))
        );

        return $this->abstractSerialize($envelope);
    }

    public function getSoapMethodName(): string
    {
        return GetClientsRequest::SOAP_METHOD;
    }

}
