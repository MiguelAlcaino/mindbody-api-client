<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester;

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

    protected function executeRequest(
        string $requestClass,
        string $resultClass,
        string $methodName,
        string $serviceUrl,
        RequestParamsInterface $request
    ): SOAPMethodResultInterface {
        $serializedBody = $this->mindbodySerializer->serialize($requestClass, $request);

        $responseBody = $this->minbodySoapRequester->request(
            $serviceUrl,
            $methodName,
            $serializedBody
        );

        return $this->mindbodySerializer->deserialize($resultClass, $responseBody);
    }
}
