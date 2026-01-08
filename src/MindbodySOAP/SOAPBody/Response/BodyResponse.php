<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response;

class BodyResponse
{
    private mixed $content;

    public function __construct(mixed $content)
    {
        $this->content = $content;
    }
}
