<?php declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response;

interface SOAPMethodResultInterface
{
    public function getMethodName(): string;
}
