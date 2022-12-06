<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester;

use JMS\Serializer\SerializerInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\NoResponseBodyInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;

class RESTRequesterExecutor
{
    private MindbodyRESTRequester $mindbodyRESTRequester;
    private SerializerInterface   $serializer;

    public function __construct(
        MindbodyRESTRequester $mindbodyRESTRequester,
        SerializerInterface $serializer
    ) {
        $this->mindbodyRESTRequester = $mindbodyRESTRequester;
        $this->serializer            = $serializer;
    }

    public function executeRequest(RESTRequest $request, ?string $responseClass): ?RESTResponse
    {
        $body = $this->serializer->serialize($request, 'json');

        $userStaffToken = null;

        if ($request instanceof UserStaffTokenRequiredInterface) {
            $userStaffToken = $request->getUserStaffToken();
        }

        $siteId = $request->getSiteId();
        $data   = $this->mindbodyRESTRequester->request(
            $request->getMethod(),
            $request->getPath(),
            $body,
            $siteId,
            $userStaffToken,
            $request->getHeaders(),
        );

        if (null === $responseClass) {
            return null;
        }

        /**
         * @var RESTResponse $response
         */
        $response = $this->serializer->deserialize($data, $responseClass, 'json');
        $response->setPayload($data);

        return $response;
    }
}
