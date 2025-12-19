<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyRequestHandler;

use GuzzleHttp\Exception\GuzzleException;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\CartItem;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\PaymentInfo;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Request\GetServicesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\SaleServiceSOAPRequester;
use RuntimeException;

class SaleServiceRequestHandler
{
    /**
     * @var SaleServiceSOAPRequester
     */
    private $saleServiceSOAPRequest;

    /**
     * SaleServiceRequestHandler constructor.
     */
    public function __construct(SaleServiceSOAPRequester $saleServiceSOAPRequest)
    {
        $this->saleServiceSOAPRequest = $saleServiceSOAPRequest;
    }

    /**
     * @deprecated This method is deprecated and should not be used. Use REST API instead.
     *
     * @throws GuzzleException
     * @throws RuntimeException
     */
    public function getFormattedServices(GetServicesRequest $request): array
    {
        throw new RuntimeException('This method is deprecated and should not be used. Please use the REST API instead.');
    }

    /**
     * @deprecated This method is deprecated and should not be used. Use REST API instead.
     *
     * @param CartItem[] $cartItems
     *
     * @throws GuzzleException
     * @throws RuntimeException
     */
    public function calculateShoppingCart(string $clientId, array $cartItems): array
    {
        throw new RuntimeException('This method is deprecated and should not be used. Please use the REST API instead.');
    }

    /**
     * @deprecated This method is deprecated and should not be used. Use REST API instead.
     *
     * Returns an array of formatted custom payment methods.
     *
     * @throws GuzzleException
     * @throws RuntimeException
     */
    public function getFormattedCustomPaymentMethods(): array
    {
        throw new RuntimeException('This method is deprecated and should not be used. Please use the REST API instead.');
    }

    /**
     * @deprecated This method is deprecated and should not be used. Use REST API instead.
     *
     * @param CartItem[]    $cartItems
     * @param PaymentInfo[] $paymentInfos
     *
     * @throws GuzzleException
     * @throws RuntimeException
     */
    public function purchaseShoppingCart(
        string  $clientId,
        array   $cartItems,
        array   $paymentInfos,
        ?string $promotionalCode = null,
        bool    $test = true,
    ): array {
        throw new RuntimeException('This method is deprecated and should not be used. Please use the REST API instead.');
    }
}
