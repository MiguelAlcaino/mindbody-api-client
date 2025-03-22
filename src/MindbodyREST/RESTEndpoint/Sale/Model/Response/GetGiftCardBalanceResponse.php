<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;

class GetGiftCardBalanceResponse extends RESTResponse
{
    #[Serializer\SerializedName("BarcodeId")]
    private string $barCodeId;

    #[Serializer\SerializedName("RemainingBalance")]
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
