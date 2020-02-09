<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\AbstractSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\GetClientServicesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\ValidateLoginParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\ValidateLoginRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\AddOrUpdateClientsResult;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\GetClientsResult;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\ValidateLoginResult;

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

    public function addOrUpdateClient(AddOrUpdateClientsParamsRequest $request): AddOrUpdateClientsResult
    {
        return $this->executeRequest(
            AddOrUpdateClientsRequest::class,
            AddOrUpdateClientsResult::class,
            'AddOrUpdateClients',
            self::SERVICE_URI,
            $request
        );
    }

    public function getClients(GetClientsParamsRequest $request): GetClientsResult
    {
        return $this->executeRequest(
            GetClientsRequest::class,
            GetClientsResult::class,
            'GetClients',
            self::SERVICE_URI,
            $request
        );
    }

    public function validateLogin(ValidateLoginParamsRequest $request): ValidateLoginResult
    {
        return $this->executeRequest(
            ValidateLoginRequest::class,
            ValidateLoginResult::class,
            'ValidateLogin',
            self::SERVICE_URI,
            $request
        );
    }
}
