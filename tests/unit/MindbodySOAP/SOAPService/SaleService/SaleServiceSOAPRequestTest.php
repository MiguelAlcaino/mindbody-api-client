<?php

namespace MindbodySOAP\SOAPService\SaleService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\CartItem;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Enum\ItemTypeEnum;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Enum\PaymentInfoTypeEnum;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Item;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\PaymentInfo;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Request\CheckoutShoppingCartParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\SaleServiceSOAPRequester;
use MiguelAlcainoTest\MindbodyApiClient\Unit\MindbodySOAP\Helper\MindbodySerializerTestTrait;
use PHPUnit\Framework\TestCase;

class SaleServiceSOAPRequestTest extends TestCase
{
    use MindbodySerializerTestTrait;

    public function testCheckoutShoppingCart()
    {
        $saleServiceRequester = $this->getSaleServiceSoapRequester();

        $response = $saleServiceRequester->checkoutShoppingCart(
            (new CheckoutShoppingCartParamsRequest(
                $this->getTestUserId(), [
                new CartItem(
                    new Item(
                        100007,
                        ItemTypeEnum::Service()
                    ),
                    1
                ),
            ], [
                    (new PaymentInfo(
                        1050,
                        PaymentInfoTypeEnum::CustomPaymentInfo()
                    ))->setId(17),
                ],
                null,
                true
            ))
        );

        $this->addToAssertionCount(1);
    }

    public function testCalculateShoppingCart()
    {
        $saleServiceRequester = $this->getSaleServiceSoapRequester();

        $response = $saleServiceRequester->checkoutShoppingCart(
            (new CheckoutShoppingCartParamsRequest(
                $this->getTestUserId(), [
                new CartItem(
                    new Item(
                        100007,
                        ItemTypeEnum::Service()
                    ),
                    1
                ),
            ], [
                    (new PaymentInfo(
                        1050,
                        PaymentInfoTypeEnum::CustomPaymentInfo()
                    ))->setId(17),
                ],
                null,
                true
            ))
                ->setFields(['paymentcheck'])
                ->setInStore(true)
        );

        $this->addToAssertionCount(1);
    }

    public function testCalculateShoppingCartWithPromoCode()
    {
        $saleServiceRequester = $this->getSaleServiceSoapRequester();

        $response = $saleServiceRequester->checkoutShoppingCart(
            (new CheckoutShoppingCartParamsRequest(
                $this->getTestUserId(), [
                new CartItem(
                    new Item(
                        100007,
                        ItemTypeEnum::Service()
                    ),
                    1
                ),
            ], [
                    (new PaymentInfo(
                        1050,
                        PaymentInfoTypeEnum::CustomPaymentInfo()
                    ))->setId(17),
                ],
                $this->getPromoCode(),
                true
            ))
                ->setFields(['paymentcheck'])
                ->setInStore(true)
        );

        $this->addToAssertionCount(1);
    }

    public function testGetCustomPaymentMethods()
    {
        $requester = $this->getSaleServiceSoapRequester();
        $result    = $requester->getCustomPaymentMethods();

        $this->addToAssertionCount(1);
    }

    private function getSaleServiceSoapRequester()
    {
        return new SaleServiceSOAPRequester(
            $this->getMindbodySoapRequester(),
            $this->getMindbodySerializer()
        );
    }
}
