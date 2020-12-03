<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response;

use JMS\Serializer\Annotation as Serializer;

class GetGiftCardBalanceResponse
{
    /**
     * @Serializer\SerializedName("BarcodeId")
     */
    private string $barCodeId;

    /**
     * @Serializer\SerializedName("RemainingBalance")
     */
    private float $remainingBalance;

    public function getBarCodeId(): string
    {
        return $this->barCodeId;
    }

    public function getRemainingBalance(): float
    {
        return $this->remainingBalance;
    }
}
