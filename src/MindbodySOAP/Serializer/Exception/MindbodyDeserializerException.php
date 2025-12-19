<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Exception;

use RuntimeException;
use Throwable;

class MindbodyDeserializerException extends RuntimeException
{
    /** @var string */
    private $payload;

    public function __construct(string $payload, string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        $this->payload = $payload;
        parent::__construct($message, $code, $previous);
    }

    public static function create(string $payload, Throwable $previous): self
    {
        return new self($payload, 'There has been an error deserializing this payload', 0, $previous);
    }

    public function getPayload(): string
    {
        return $this->payload;
    }
}
