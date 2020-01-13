<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response;

class BodyResponse
{
    private $content;

    public function __construct($content)
    {
        $this->content = $content;
    }
}
