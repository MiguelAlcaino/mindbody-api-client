<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\AbstractSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\ClientService\AddOrUpdateClientsSerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\GetClientServicesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\ValidateLoginRequest;

class ClientServiceSOAPRequester extends AbstractSOAPRequester
{
    private const SERVICE_URI = 'https://api.mindbodyonline.com/0_5_1/ClientService.asmx';

    public function getClientServices(GetClientServicesRequest $request): array
    {
        return $this->minbodySoapRequester->createEnvelopeAndExecuteRequest(
            self::SERVICE_URI,
            'GetClientServices',
            $this->decodeRequesterObject($request)
        );
    }

    public function addOrUpdateClient(AddOrUpdateClientsParamsRequest $request): array
    {
        /** @var AddOrUpdateClientsSerializer $serializer */
        $serializer = $this->getSerializer(AddOrUpdateClientsSerializer::class);

        return $this->minbodySoapRequester->createAndExecuteRequest(
            self::SERVICE_URI,
            $request,
            $serializer,
            false
        );
    }

    public function validateLogin(ValidateLoginRequest $request): array
    {
        return $this->minbodySoapRequester->createEnvelopeAndExecuteRequest(
            self::SERVICE_URI,
            'ValidateLogin',
            $this->decodeRequesterObject($request)
        );
    }
}
