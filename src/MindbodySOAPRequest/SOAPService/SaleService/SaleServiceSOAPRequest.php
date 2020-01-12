<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAPRequest\SaleService;

use MiguelAlcaino\MindbodyApiClient\BaseRequester\AbstractSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAPRequest\SOAPService\SaleService\Model\CheckoutShoppingCartRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAPRequest\SOAPService\SaleService\Model\GetServicesRequest;

class SaleServiceSOAPRequest extends AbstractSOAPRequester
{
    private const SERVICE_URI = 'https://api.mindbodyonline.com/0_5_1/SaleService.asmx';

    public function getServices(?GetServicesRequest $request = null): array
    {
        return $this->minbodySoapRequester->createEnvelopeAndExecuteRequest(
            self::SERVICE_URI,
            'GetServices',
            $this->decodeRequesterObject($request)
        );
    }

    public function checkoutShoppingCart(CheckoutShoppingCartRequest $request): array
    {
        return $this->minbodySoapRequester->createEnvelopeAndExecuteRequest(
            self::SERVICE_URI,
            'CheckoutShoppingCart',
            $this->decodeRequesterObject($request)
        );
    }

    public function getCustomPaymentMethods(): array
    {
        return $this->minbodySoapRequester->createEnvelopeAndExecuteRequest(
            self::SERVICE_URI,
            'GetCustomPaymentMethods'
        );
    }
}
