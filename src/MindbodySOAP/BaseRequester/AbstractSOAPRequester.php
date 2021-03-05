<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester;

use GuzzleHttp\Exception\GuzzleException;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Exception\RequestException;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Exception\MindbodyDeserializerException;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Exception\MindbodySerializerException;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Serializer\MindbodySerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractSOAPMethod;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\Request;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestParamsInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\UserCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\SOAPMethodResultInterface;
use Webmozart\Assert\Assert;

abstract class AbstractSOAPRequester
{
    /**
     * Date format used in mindbody requests
     */
    public const DATE_MINDBODY_FORMAT = 'Y-m-d\TH:i:s';

    protected MindbodySOAPRequester $minbodySoapRequester;
    protected MindbodySerializer    $mindbodySerializer;
    private SourceCredentials       $sourceCredentials;
    private UserCredentials         $userCredentials;

    public function __construct(
        MindbodySOAPRequester $minbodySoapRequester,
        MindbodySerializer $mindbodySerializer,
        SourceCredentials $sourceCredentials,
        UserCredentials $userCredentials
    ) {
        $this->minbodySoapRequester = $minbodySoapRequester;
        $this->mindbodySerializer   = $mindbodySerializer;
        $this->sourceCredentials    = $sourceCredentials;
        $this->userCredentials      = $userCredentials;
    }

    /**
     * @param mixed $requesterObject
     *
     * @return array
     */
    public function decodeRequesterObject($requesterObject): array
    {
        return $requesterObject === null ? [] : json_decode(json_encode($requesterObject), true);
    }

    /**
     * @param AbstractParamsRequest|RequestParamsInterface $requestParams
     *
     * @throws MindbodySerializerException
     * @throws MindbodyDeserializerException
     * @throws RequestException
     */
    protected function executeRequest(
        string $requestClass,
        string $resultClass,
        string $methodName,
        string $serviceUrl,
        AbstractParamsRequest $requestParams = null,
        bool $useUserCredentials = true
    ): SOAPMethodResultInterface {
        $preEnvelopedRequest = $this->getRequest($requestClass, $requestParams, $useUserCredentials);
        $serializedBody      = $this->mindbodySerializer->serialize($preEnvelopedRequest);

        try {
            $responseBody = $this->minbodySoapRequester->request(
                $serviceUrl,
                $methodName,
                $serializedBody,
                null !== $requestParams ? $requestParams->getHeaders() : []
            );
        } catch (GuzzleException $exception) {
            throw RequestException::createFromRequest($serializedBody, $requestParams, $exception);
        }

        return $this->mindbodySerializer->deserialize($resultClass, $responseBody);
    }

    public function withSourceCredentials(SourceCredentials $sourceCredentials): self
    {
        $clone                    = clone $this;
        $clone->sourceCredentials = $sourceCredentials;

        return $clone;
    }

    public function withUserCredentials(UserCredentials $userCredentials): self
    {
        $clone                  = clone $this;
        $clone->userCredentials = $userCredentials;

        return $clone;
    }

    private function getRequest(
        string $requestClass,
        ?AbstractParamsRequest $requestParams,
        bool $useUserCredentials
    ): AbstractSOAPMethod {
        $preEnvelopedInstance = new $requestClass(
            new Request(
                $this->sourceCredentials,
                $requestParams,
                $useUserCredentials ? $this->userCredentials : null
            )
        );

        Assert::isInstanceOf($preEnvelopedInstance, AbstractSOAPMethod::class);

        return $preEnvelopedInstance;
    }
}
