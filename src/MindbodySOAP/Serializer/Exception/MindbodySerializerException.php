<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Exception;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\EnvelopeRequest;
use RuntimeException;
use Throwable;

class MindbodySerializerException extends RuntimeException
{
    /** @var EnvelopeRequest */
    private $envelope;

    public function __construct(EnvelopeRequest $envelope, string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        $this->envelope = $envelope;

        parent::__construct($message, $code, $previous);
    }

    public static function createFromEnvelopeRequest(EnvelopeRequest $envelopeRequest, ?Throwable $previous = null): self
    {
        return new self(
            $envelopeRequest,
            'There has been an error trying to serialize this envelope request. Check the $envelope for more details',
            0,
            $previous
        );
    }

    public function getEnvelope(): EnvelopeRequest
    {
        return $this->envelope;
    }
}
