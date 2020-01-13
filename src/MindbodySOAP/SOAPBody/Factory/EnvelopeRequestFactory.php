<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractSOAPMethod;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\BodyRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\EnvelopeRequest;

class EnvelopeRequestFactory
{
    public static function create(AbstractSOAPMethod $content): EnvelopeRequest
    {
        return new EnvelopeRequest(new BodyRequest($content));
    }
}
