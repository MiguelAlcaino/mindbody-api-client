<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Exception;

use GuzzleHttp\Exception\ClientException;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Exception\MindbodyRESTResponseException;

class NotEnoughBalanceInGiftCardException extends MindbodyRESTResponseException
{
    private float $balance;

    public static function create(float $balance, ClientException $guzzleException = null): self
    {
        return new self(
            sprintf('Your gift card does not have enough balance. Current balance is %f', $balance),
            0,
            $guzzleException
        );
    }

    public function getBalance(): float
    {
        return $this->balance;
    }
}
