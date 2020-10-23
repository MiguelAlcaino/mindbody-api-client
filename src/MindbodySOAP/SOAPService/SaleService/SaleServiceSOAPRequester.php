<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\AbstractSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Request\CheckoutShoppingCartParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Request\CheckoutShoppingCartRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Request\GetCustomPaymentMethodsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Request\GetServicesParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Request\GetServicesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response\CheckoutShoppingCartResult;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response\GetCustomPaymentMethodsResult;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response\GetServicesResult;

class SaleServiceSOAPRequester extends AbstractSOAPRequester
{
    private const SERVICE_URI = 'https://api.mindbodyonline.com/0_5_1/SaleService.asmx';

    public function getServices(GetServicesParamsRequest $request): GetServicesResult
    {
        return $this->executeRequest(
            GetServicesRequest::class,
            GetServicesResult::class,
            'GetServices',
            self::SERVICE_URI,
            $request
        );
    }

    public function checkoutShoppingCart(CheckoutShoppingCartParamsRequest $request): CheckoutShoppingCartResult
    {
        return $this->executeRequest(
            CheckoutShoppingCartRequest::class,
            CheckoutShoppingCartResult::class,
            'CheckoutShoppingCart',
            self::SERVICE_URI,
            $request
        );
    }

    public function getCustomPaymentMethods(): GetCustomPaymentMethodsResult
    {
        return $this->executeRequest(
            GetCustomPaymentMethodsRequest::class,
            GetCustomPaymentMethodsResult::class,
            'GetCustomPaymentMethods',
            self::SERVICE_URI
        );
    }
}
