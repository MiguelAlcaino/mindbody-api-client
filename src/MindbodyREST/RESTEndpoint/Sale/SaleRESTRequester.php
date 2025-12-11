<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale;

use GuzzleHttp\Exception\ClientException;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\RESTRequesterExecutor;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\ResponseExceptionHandler;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Request\GETGiftCardBalanceRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Request\GETGiftCardsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Request\GETServicesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Request\POSTCheckoutShoppingCartRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response\GetGiftCardBalanceResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response\GETGiftCardsResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response\GETServicesResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response\POSTCheckoutShoppingCartResponse;

class SaleRESTRequester
{
    private RESTRequesterExecutor $restRequester;
    private ResponseExceptionHandler $responseExceptionHandler;

    public function __construct(
        RESTRequesterExecutor    $RESTRequester,
        ResponseExceptionHandler $responseExceptionHandler,
    ) {
        $this->restRequester            = $RESTRequester;
        $this->responseExceptionHandler = $responseExceptionHandler;
    }

    public function getGiftCards(GETGiftCardsRequest $request): GETGiftCardsResponse
    {
        return $this->restRequester->executeRequest($request, GETGiftCardsResponse::class);
    }

    public function getGiftCardBalance(GETGiftCardBalanceRequest $request): GetGiftCardBalanceResponse
    {
        return $this->restRequester->executeRequest($request, GetGiftCardBalanceResponse::class);
    }

    public function postCheckoutShoppingCart(POSTCheckoutShoppingCartRequest $request): POSTCheckoutShoppingCartResponse
    {
        try {
            return $this->restRequester->executeRequest($request, POSTCheckoutShoppingCartResponse::class);
        } catch (ClientException $exception) {
            throw $this->responseExceptionHandler->getMindbodyException($exception);
        }
    }

    public function getServices(GETServicesRequest $request): GETServicesResponse
    {
        return $this->restRequester->executeRequest($request, GETServicesResponse::class);
    }
}
