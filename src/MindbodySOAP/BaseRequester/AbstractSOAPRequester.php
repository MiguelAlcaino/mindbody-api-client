<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester;

use GuzzleHttp\Exception\GuzzleException;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Exception\RequestException;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Exception\MindbodyDeserializerException;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Exception\MindbodySerializerException;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Serializer\MindbodySerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestParamsInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\SOAPMethodResultInterface;

abstract class AbstractSOAPRequester
{
    /**
     * Date format used in mindbody requests
     */
    public const DATE_MINDBODY_FORMAT = 'Y-m-d\TH:i:s';

    /** @var MindbodySOAPRequester */
    protected $minbodySoapRequester;

    /** @var MindbodySerializer */
    protected $mindbodySerializer;

    public function __construct(MindbodySOAPRequester $minbodySoapRequester, MindbodySerializer $mindbodySerializer)
    {
        $this->minbodySoapRequester = $minbodySoapRequester;
        $this->mindbodySerializer   = $mindbodySerializer;
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
     * @param string                 $requestClass
     * @param string                 $resultClass
     * @param string                 $methodName
     * @param string                 $serviceUrl
     * @param RequestParamsInterface $request
     *
     * @return SOAPMethodResultInterface
     * @throws MindbodySerializerException
     * @throws MindbodyDeserializerException
     * @throws RequestException
     */
    protected function executeRequest(
        string $requestClass,
        string $resultClass,
        string $methodName,
        string $serviceUrl,
        RequestParamsInterface $request = null
    ): SOAPMethodResultInterface {
        $serializedBody = $this->mindbodySerializer->serialize($requestClass, $request);

        try {
            $responseBody = $this->minbodySoapRequester->request(
                $serviceUrl,
                $methodName,
                $serializedBody
            );
        } catch (GuzzleException $exception) {
            throw RequestException::createFromRequest($serializedBody, $request, $exception);
        }

        return $this->mindbodySerializer->deserialize($resultClass, $responseBody);
    }
}
