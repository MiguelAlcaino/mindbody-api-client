<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale;

use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\AbstractRESTRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Request\GETGiftCardBalanceRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Request\GETGiftCardsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response\GetGiftCardBalanceResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response\GETGiftCardsResponse;

class SaleRESTRequester extends AbstractRESTRequester
{
    public function getGiftCards(GETGiftCardsRequest $request): GETGiftCardsResponse
    {
        return $this->executeRequest($request, GETGiftCardsResponse::class);
    }

    public function getGiftCardBalance(GETGiftCardBalanceRequest $request): GetGiftCardBalanceResponse
    {
        return $this->executeRequest($request, GetGiftCardBalanceResponse::class);
    }
}
