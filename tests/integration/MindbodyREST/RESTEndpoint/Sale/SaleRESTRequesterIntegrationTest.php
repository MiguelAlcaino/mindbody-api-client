<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Integration\MindbodyREST\RESTEndpoint\Sale;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
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
use PHPUnit\Framework\TestCase;

class SaleRESTRequesterIntegrationTest extends TestCase
{
    public function testPostCheckoutShoppingCartWithAccessDenied(): void
    {
        $mock = new MockHandler([
            new Response(401, [], json_encode([
                'Error' => [
                    'Message' => 'Access denied',
                    'Code'    => 'DeniedAccess',
                ],
            ])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $guzzleClient = new Client(['handler' => $handlerStack]);

        $saleRequester = $this->getRequester($guzzleClient);

        $paymentMetadata = new PaymentMetadata(550);
        $paymentMetadata->setCardNumber('403829317418');
        $itemMetadata = new CartItemMetadata(100006);
        $request      = new POSTCheckoutShoppingCartRequest(
            '100019337',
            [
                new CartItem(new Item(ItemTypeEnum::SERVICE, $itemMetadata), 1),
            ],
            [
                new PaymentInfo(PaymentInfoTypeEnum::GIFT_CARD, $paymentMetadata),
            ],
        );
        $request
            ->setSiteId(123456)
            ->setUserStaffToken('FAKE_TOKEN')
            ->setTest(true);

        $this->expectException(AccessDeniedException::class);
        $saleRequester->postCheckoutShoppingCart($request);
    }

    private function getRequester(Client $guzzleClient): SaleRESTRequester
    {
        $serializerFactory = new JmsSerializerFactory();
        $serializer        = $serializerFactory->create();

        $restRequester = new MindbodyRESTRequester(
            'FAKE_API_KEY',
            $guzzleClient,
        );

        $restRequesterExecutor = new RESTRequesterExecutor($restRequester, $serializer);
        $exceptionHandler      = new ResponseExceptionHandler();

        return new SaleRESTRequester($restRequesterExecutor, $exceptionHandler);
    }
}
