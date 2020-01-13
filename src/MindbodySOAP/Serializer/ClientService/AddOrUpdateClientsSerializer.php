<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\ClientService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Base\AbstractMindbodySerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory\EnvelopeRequestFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\Request;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestParamsInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\UserCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\AddOrUpdateClientsResponse;

class AddOrUpdateClientsSerializer extends AbstractMindbodySerializer
{
    protected const DESERIALIZABLE_CLASS = AddOrUpdateClientsResponse::class;

    /**
     * @param AddOrUpdateClientsParamsRequest|RequestParamsInterface $requestParams
     * @param SourceCredentials                                      $sourceCredentials
     * @param UserCredentials|null                                   $userCredentials
     *
     * @return string
     */
    public function serialize(
        RequestParamsInterface $requestParams,
        SourceCredentials $sourceCredentials,
        ?UserCredentials $userCredentials = null
    ): string {
        $envelope = EnvelopeRequestFactory::create(
            new AddOrUpdateClientsRequest(new Request($sourceCredentials, $requestParams, $userCredentials))
        );

        return $this->abstractSerialize($envelope);
    }

    public function getSoapMethodName(): string
    {
        return AddOrUpdateClientsRequest::SOAP_METHOD;
    }
}
