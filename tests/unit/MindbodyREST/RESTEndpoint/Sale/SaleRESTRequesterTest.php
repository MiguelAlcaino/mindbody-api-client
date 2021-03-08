<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodyREST\RESTEndpoint\Sale;

use Codeception\Test\Unit;
use GuzzleHttp\Client;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\MindbodyRESTRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\RESTRequesterExecutor;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\ResponseExceptionHandler;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\CartItem;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\CartItemMetadata;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Item;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\ItemTypeEnum;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\PaymentInfo;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\PaymentInfoTypeEnum;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\PaymentMetadata;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Request\POSTCheckoutShoppingCartRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\SaleRESTRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken\Exception\AccessDeniedException;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Factory\JmsSerializerFactory;

use MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodySOAP\Helper\MindbodyUtilsTrait;

class SaleRESTRequesterTest extends Unit
{
    use MindbodyUtilsTrait;

    public function testPostCheckoutShoppingCart()
    {
        $saleRequester = $this->getRequester();

        $paymentMetadata = new PaymentMetadata(550);
        // $paymentMetadata->setId(17);
        $paymentMetadata->setCardNumber('403829317418');
        $itemMetadata = new CartItemMetadata(100006);
        $request      = new POSTCheckoutShoppingCartRequest(
            '100019337',
            [
                new CartItem(new Item(ItemTypeEnum::Service(), $itemMetadata), 1),
            ],
            [
                new PaymentInfo(PaymentInfoTypeEnum::GiftCard(), $paymentMetadata),
            ]
        );
        $request
            ->setSiteId($this->getSiteIds()[0])
            ->setUserStaffToken('FAKE')
            ->setTest(true);

        $this->expectException(AccessDeniedException::class);
        $response = $saleRequester->postCheckoutShoppingCart($request);
    }

    private function getRequester(): SaleRESTRequester
    {
        $serializerFactory = new JmsSerializerFactory();
        $serializer        = $serializerFactory->create();

        $restRequester = new MindbodyRESTRequester(
            $this->getApiKey(),
            new Client()
        );

        $restRequesterExecutor = new RESTRequesterExecutor($restRequester, $serializer);

        $exceptionHandler = new ResponseExceptionHandler();

        return new SaleRESTRequester($restRequesterExecutor, $exceptionHandler);
    }
}
