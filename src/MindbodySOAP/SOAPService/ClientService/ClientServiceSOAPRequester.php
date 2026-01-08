<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\AbstractSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\AddOrUpdateClientsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientPurchasesParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientPurchasesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientServicesParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientServicesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientVisitsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientVisitsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\ValidateLoginParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\ValidateLoginRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\AddOrUpdateClientsResult;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\GetClientPurchasesResult;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\GetClientServicesResult;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\GetClientsResult;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\GetClientVisitsResult;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\ValidateLoginResult;

class ClientServiceSOAPRequester extends AbstractSOAPRequester
{
    private const SERVICE_URI = 'https://api.mindbodyonline.com/0_5_1/ClientService.asmx';

    public function getClientPurchases(GetClientPurchasesParamsRequest $request): GetClientPurchasesResult
    {
        return $this->executeRequest(
            GetClientPurchasesRequest::class,
            GetClientPurchasesResult::class,
            'GetClientPurchases',
            self::SERVICE_URI,
            $request,
        );
    }

    public function getClientServices(GetClientServicesParamsRequest $request): GetClientServicesResult
    {
        return $this->executeRequest(
            GetClientServicesRequest::class,
            GetClientServicesResult::class,
            'GetClientServices',
            self::SERVICE_URI,
            $request,
        );
    }

    public function addOrUpdateClient(AddOrUpdateClientsParamsRequest $request): AddOrUpdateClientsResult
    {
        return $this->executeRequest(
            AddOrUpdateClientsRequest::class,
            AddOrUpdateClientsResult::class,
            'AddOrUpdateClients',
            self::SERVICE_URI,
            $request,
            false,
        );
    }

    public function getClients(GetClientsParamsRequest $request): GetClientsResult
    {
        return $this->executeRequest(
            GetClientsRequest::class,
            GetClientsResult::class,
            'GetClients',
            self::SERVICE_URI,
            $request,
        );
    }

    public function validateLogin(ValidateLoginParamsRequest $request): ValidateLoginResult
    {
        return $this->executeRequest(
            ValidateLoginRequest::class,
            ValidateLoginResult::class,
            'ValidateLogin',
            self::SERVICE_URI,
            $request,
            false,
        );
    }

    public function getClientVisits(GetClientVisitsParamsRequest $request): GetClientVisitsResult
    {
        return $this->executeRequest(
            GetClientVisitsRequest::class,
            GetClientVisitsResult::class,
            'GetClientVisits',
            self::SERVICE_URI,
            $request,
            false,
        );
    }
}
