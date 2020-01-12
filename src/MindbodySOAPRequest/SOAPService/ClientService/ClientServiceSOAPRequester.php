<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAPRequest\ClientService;

use MiguelAlcaino\MindbodyApiClient\BaseRequester\AbstractSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAPRequest\SOAPService\ClientService\Model\GetClientServicesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAPRequest\SOAPService\ClientService\Model\ValidateLoginRequest;

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

    public function validateLogin(ValidateLoginRequest $request): array
    {
        return $this->minbodySoapRequester->createEnvelopeAndExecuteRequest(
            self::SERVICE_URI,
            'ValidateLogin',
            $this->decodeRequesterObject($request)
        );
    }
}
