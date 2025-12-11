<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyRequestHandler;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SaleServiceSOAPRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\CartItem;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\CheckoutShoppingCartRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\GetServicesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\PaymentInfo;

class SaleServiceRequestHandler
{
    /**
     * @var SaleServiceSOAPRequest
     */
    private $saleServiceSOAPRequest;

    /**
     * SaleServiceRequestHandler constructor.
     */
    public function __construct(SaleServiceSOAPRequest $saleServiceSOAPRequest)
    {
        $this->saleServiceSOAPRequest = $saleServiceSOAPRequest;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFormattedServices(?GetServicesRequest $request = null): array
    {
        $services = $this->saleServiceSOAPRequest->getServices($request);

        $formattedServices = [];
        foreach ($services['GetServicesResult']['Services']['Service'] as $service) {
            $formattedServices[] = [
                'name'  => $service['Name'],
                'price' => $service['OnlinePrice'],
                'id'    => $service['ID'],
            ];
        }

        usort(
            $formattedServices,
            function ($a, $b) {
                $pos_a = $a['price'];
                $pos_b = $b['price'];

                return $pos_a - $pos_b;
            },
        );

        return $formattedServices;
    }

    /**
     * @param CartItem[] $cartItems
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function calculateShoppingCart(string $clientId, array $cartItems): array
    {
        $checkoutShoppingCartRequest = new CheckoutShoppingCartRequest(
            $clientId,
            $cartItems,
            true,
        );
        $checkoutShoppingCartRequest
            ->setInStore(true)
            ->setFields(['paymentcheck']);

        return $this->saleServiceSOAPRequest->checkoutShoppingCart($checkoutShoppingCartRequest);
    }

    /**
     * Returns an array of formatted custom payment methods.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFormattedCustomPaymentMethods(): array
    {
        $customPaymentMethods = $this->saleServiceSOAPRequest->getCustomPaymentMethods();
        dump($customPaymentMethods);
        $formattedCustomPaymentMethods = [];

        if (1 === (int)$customPaymentMethods['GetCustomPaymentMethodsResult']['ResultCount']) {
            $customPaymentMethod                                         = $customPaymentMethods['GetCustomPaymentMethodsResult']['PaymentMethods']['CustomPaymentInfo'];
            $formattedCustomPaymentMethods[$customPaymentMethod['Name']] = $customPaymentMethod['ID'];
        } else {
            foreach ($customPaymentMethods['GetCustomPaymentMethodsResult']['PaymentMethods']['CustomPaymentInfo'] as $customPaymentMethod) {
                $formattedCustomPaymentMethods[$customPaymentMethod['Name']] = $customPaymentMethod['ID'];
            }
        }

        return $formattedCustomPaymentMethods;
    }

    /**
     * @param CartItem[]    $cartItems
     * @param PaymentInfo[] $paymentInfos
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function purchaseShoppingCart(
        string  $clientId,
        array   $cartItems,
        array   $paymentInfos,
        ?string $promotionalCode = null,
        bool    $test = true,
    ): array {
        $checkoutShoppingCartRequest = new CheckoutShoppingCartRequest(
            $clientId,
            $cartItems,
            $test,
        );
        $checkoutShoppingCartRequest
            ->setPayments($paymentInfos)
            ->setPromotionCode($promotionalCode);

        return $this->saleServiceSOAPRequest->checkoutShoppingCart($checkoutShoppingCartRequest);
    }
}
