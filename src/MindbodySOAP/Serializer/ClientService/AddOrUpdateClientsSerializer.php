<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\ClientService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Base\AbstractMindbodySerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory\EnvelopeRequestFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\Request;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\UserCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\AddOrUpdateClientsResponse;

class AddOrUpdateClientsSerializer extends AbstractMindbodySerializer
{
    protected const DESERIALIZABLE_CLASS = AddOrUpdateClientsResponse::class;

    public function serialize(
        AddOrUpdateClientsParamsRequest $requestParams,
        SourceCredentials $sourceCredentials,
        ?UserCredentials $userCredentials = null
    ): string {
        $envelope = EnvelopeRequestFactory::create(
            new AddOrUpdateClientsRequest(new Request($sourceCredentials, $requestParams, $userCredentials))
        );

        return $this->abstractSerialize($envelope);
    }

}
