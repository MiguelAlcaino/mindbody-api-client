<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\BodyResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\EnvelopeResponse;

class EnvelopeResponseFactory
{
    /**
     * @param mixed $content
     */
    public static function create($content): EnvelopeResponse
    {
        return new EnvelopeResponse(new BodyResponse($content));
    }
}
