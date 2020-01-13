<?php

namespace MiguelAlcaino\MindbodyApiClient\BaseRequester;

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
}