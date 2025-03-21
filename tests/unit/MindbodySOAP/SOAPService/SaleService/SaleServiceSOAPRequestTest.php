<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodySOAP\SOAPService\SaleService;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\MindbodySOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\CartItem;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Enum\ItemTypeEnum;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Enum\PaymentInfoTypeEnum;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Item;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\PaymentInfo;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Request\CheckoutShoppingCartParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Request\GetServicesParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\SaleServiceSOAPRequester;
use MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodySOAP\Helper\MindbodyUtilsTrait;
use PHPUnit\Framework\TestCase;

class SaleServiceSOAPRequestTest extends TestCase
{
    use MindbodyUtilsTrait;

    // public function testCheckoutShoppingCart()
    // {
    //     $saleServiceRequester = $this->getSaleServiceSoapRequester(true);
    //
    //     $response = $saleServiceRequester->checkoutShoppingCart(
    //         (new CheckoutShoppingCartParamsRequest(
    //             $this->getTestUserId(), [
    //             new CartItem(
    //                 new Item(
    //                     100007,
    //                     ItemTypeEnum::SERVICE
    //                 ),
    //                 1
    //             ),
    //         ], [
    //                 (new PaymentInfo(
    //                     1050,
    //                     PaymentInfoTypeEnum::CUSTOM_PAYMENT_INFO
    //                 ))->setId(17),
    //             ],
    //             null,
    //             true
    //         ))
    //     );
    //
    //     $this->addToAssertionCount(1);
    // }

    // public function testCalculateShoppingCart()
    // {
    //     $saleServiceRequester = $this->getSaleServiceSoapRequester();
    //
    //     $response = $saleServiceRequester->checkoutShoppingCart(
    //         (new CheckoutShoppingCartParamsRequest(
    //             $this->getTestUserId(), [
    //             new CartItem(
    //                 new Item(
    //                     100007,
    //                     ItemTypeEnum::SERVICE
    //                 ),
    //                 1
    //             ),
    //         ], [
    //                 (new PaymentInfo(
    //                     1050,
    //                     PaymentInfoTypeEnum::CUSTOM_PAYMENT_INFO
    //                 ))->setId(17),
    //             ],
    //             null,
    //             true
    //         ))
    //             ->setFields(['paymentcheck'])
    //             ->setInStore(true)
    //     );
    //
    //     $this->addToAssertionCount(1);
    // }

    // public function testCalculateShoppingCartWithPromoCode()
    // {
    //     $saleServiceRequester = $this->getSaleServiceSoapRequester();
    //
    //     $response = $saleServiceRequester->checkoutShoppingCart(
    //         (new CheckoutShoppingCartParamsRequest(
    //             $this->getTestUserId(), [
    //             new CartItem(
    //                 new Item(
    //                     100007,
    //                     ItemTypeEnum::SERVICE
    //                 ),
    //                 1
    //             ),
    //         ], [
    //                 (new PaymentInfo(
    //                     1050,
    //                     PaymentInfoTypeEnum::CUSTOM_PAYMENT_INFO
    //                 ))->setId(17),
    //             ],
    //             $this->getPromoCode(),
    //             true
    //         ))
    //             ->setFields(['paymentcheck'])
    //             ->setInStore(true)
    //     );
    //
    //     $this->addToAssertionCount(1);
    // }

    public function testGetCustomPaymentMethods()
    {
        $requester      = $this->getSaleServiceSoapRequester(true);
        $result         = $requester->getCustomPaymentMethods();
        $paymentMethods = $result->getPaymentMethods();

        self::assertGreaterThan(0, count($paymentMethods));
    }

    public function testGetServicesWithMockResponse()
    {
        $mock         = new MockHandler(
            [
                new Response(200, [], $this->getServicesResponse()),
            ]
        );
        $handlerStack = HandlerStack::create($mock);
        $guzzleClient = new Client(['handler' => $handlerStack]);

        $requester = $this->getSaleServiceSoapRequester(true, $guzzleClient);
        $result    = $requester->getServices(new GetServicesParamsRequest());
        $services  = $result->getServices();
        self::assertGreaterThan(0, count($services));

        /**
         * <Service>
         * <Price>100.0000</Price>
         * <OnlinePrice>100.0000</OnlinePrice>
         * <ProgramID>10</ProgramID>
         * <TaxRate>0</TaxRate>
         * <ProductID>1111</ProductID>
         * <ID>1111</ID>
         * <Name>Intense Bootcamp</Name>
         * <Count>8</Count>
         * </Service>
         */
        $service = $services[0];
        self::assertEquals(100.0000, $service->getPrice());
        self::assertEquals(100.0000, $service->getOnlinePrice());
        self::assertEquals(10, $service->getProgramId());
        self::assertEquals(0, $service->getTaxRate());
        self::assertEquals(1111, $service->getProductId());
        self::assertEquals(1111, $service->getId());
        self::assertEquals('Intense Bootcamp', $service->getName());
        self::assertEquals(8, $service->getCount());
    }

    private function getSaleServiceSoapRequester(bool $useFreeSite, Client $guzzleClient = null)
    {
        return new SaleServiceSOAPRequester(
            new MindbodySOAPRequester($guzzleClient),
            $this->getMindbodySerializer(),
            $this->getSourceCredentials($useFreeSite),
            $this->getUserCredentials($useFreeSite)
        );
    }

    private function getServicesResponse(): string
    {
        return file_get_contents(__DIR__ . '/../../../Resources/mindbody_responses/GetServicesResponse.xml');
    }
}
