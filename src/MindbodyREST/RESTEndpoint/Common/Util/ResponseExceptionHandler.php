<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util;

use GuzzleHttp\Exception\ClientException;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Exception\MindbodyRESTResponseException;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Exception\NotEnoughBalanceInGiftCardException;

class ResponseExceptionHandler
{
    public function getMindbodyException(ClientException $exception): MindbodyRESTResponseException
    {
        $body        = (string)$exception->getResponse()->getBody();
        $decodedBody = json_decode($body, true);

        if (isset($decodedBody['Error']) && isset($decodedBody['Error']['Message'])) {
            if (strpos($decodedBody['Error']['Message'], 'Payment does not have enough credit. Gift Card Id ') !== false) {
                $explodedErrorMessage = explode('Balance is $', $decodedBody['Error']['Message']);

                return NotEnoughBalanceInGiftCardException::create((float)$explodedErrorMessage[1]);
            }
        }

        return new MindbodyRESTResponseException('There has been an unhandled error in the Mindbody response', 0, $exception);
    }
}
