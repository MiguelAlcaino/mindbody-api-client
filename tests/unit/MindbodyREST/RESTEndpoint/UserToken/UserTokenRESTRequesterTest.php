<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodyREST\RESTEndpoint\UserToken;

use Codeception\Test\Unit;
use GuzzleHttp\Client;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\MindbodyRESTRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\RESTRequesterExecutor;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\ResponseExceptionHandler;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken\Request\POSTIssueRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\UserToken\UserTokenRESTRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Factory\JmsSerializerFactory;
use MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodySOAP\Helper\MindbodyUtilsTrait;

class UserTokenRESTRequesterTest extends Unit
{
    use MindbodyUtilsTrait;

    public function testIssueUserToken()
    {
        $requester = $this->getRequester();
        $request   = new POSTIssueRequest(
            $this->getAdminUsername(),
            $this->getAdminPassword()
        );
        $request->setSiteId($this->getSiteIds(false)[0]);
        $response = $requester->issueUserToken($request);

        self::assertNotNull($response);
    }

    private function getRequester()
    {
        $serializerFactory = new JmsSerializerFactory();
        $serializer        = $serializerFactory->create();

        $restRequester = new MindbodyRESTRequester(
            $this->getApiKey(),
            new Client()
        );

        return new UserTokenRESTRequester(new RESTRequesterExecutor($restRequester, $serializer), new ResponseExceptionHandler());
    }
}
