<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\MindbodySOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Base\AbstractMindbodySerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Factory\JmsSerializerFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Factory\MindbodySerializerFactory;

abstract class AbstractSOAPRequester
{
    /**
     * Date format used in mindbody requests
     */
    public const DATE_MINDBODY_FORMAT = 'Y-m-d\TH:i:s';

    /** @var MindbodySOAPRequester */
    protected $minbodySoapRequester;

    public function __construct(MindbodySOAPRequester $minbodySoapRequester)
    {
        $this->minbodySoapRequester = $minbodySoapRequester;
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

    public function getSerializer(string $mindbodySerializerClass): AbstractMindbodySerializer
    {
        $jmsFactory                = new JmsSerializerFactory();
        $mindbodySerializerFactory = new MindbodySerializerFactory(
            $jmsFactory->create(),
            $mindbodySerializerClass
        );

        return $mindbodySerializerFactory->create();
    }
}
