<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Exception;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestParamsInterface;
use RuntimeException;
use Throwable;

class RequestException extends RuntimeException
{
    /** @var string */
    private $payload;

    /** @var RequestParamsInterface */
    private $requestParams;

    public function __construct(
        string $payload,
        RequestParamsInterface $requestParams,
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null
    ) {
        $this->payload = $payload;
        $this->requestParams = $requestParams;

        parent::__construct($message, $code, $previous);
    }

    public static function createFromRequest(string $payload, RequestParamsInterface $requestParams, ?Throwable $previous = null): RequestException
    {
        return new self($payload, $requestParams, 'There has been an error while requesting', 0, $previous);
    }

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function getRequestParams(): RequestParamsInterface
    {
        return $this->requestParams;
    }

}
