<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\ClientService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Base\AbstractMindbodySerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory\EnvelopeRequestFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractSOAPMethod;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\Request;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\UserCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\AddOrUpdateClientsResponse;

class AddOrUpdateClientsSerializer extends AbstractMindbodySerializer
{
    protected const DESERIALIZABLE_CLASS = AddOrUpdateClientsResponse::class;

    public function serialize(AbstractSOAPMethod $data, SourceCredentials $sourceCredentials, UserCredentials $userCredentials): string
    {
        $data->setRequest(new Request($sourceCredentials, $userCredentials));

        $envelope = EnvelopeRequestFactory::create($data);

        return $this->abstractSerialize($envelope);
    }

}
