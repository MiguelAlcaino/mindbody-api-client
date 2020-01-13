<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\ClientService;

use MiguelAlcaino\MindbodyApiClient\BaseRequester\AbstractSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\AddOrUpdateClientsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\GetClientServicesRequest;
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

    public function addOrUpdateClient(AddOrUpdateClientsRequest $request)
    {
        $response = $this->minbodySoapRequester->createEnvelopeAndExecuteRequest(
            self::SERVICE_URI,
            'AddOrUpdateClient',
            $this->decodeRequesterObject($request)
        );

        return $response;
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
