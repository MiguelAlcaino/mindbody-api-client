<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester;

use JMS\Serializer\SerializerInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;

abstract class AbstractRESTRequester
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

    protected function executeRequest(RESTRequest $request, string $responseClass)
    {
        $body = $this->serializer->serialize($request, 'json');

        $userStaffToken = null;

        if ($request instanceof UserStaffTokenRequiredInterface) {
            $userStaffToken = $request->getUserStaffToken();
        }

        $data = $this->mindbodyRESTRequester->request(
            $request->getMethod(),
            $request->getPath(),
            $body,
            $userStaffToken
        );

        return $this->serializer->deserialize($data, $responseClass, 'json');
    }
}
