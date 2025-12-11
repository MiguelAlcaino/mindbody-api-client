<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Model\MindbodyPaginatedResultTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;

class GetServicesResult extends AbstractBaseResultResponse
{
    use MindbodyPaginatedResultTrait;

    #[Serializer\Type]
    #[Serializer\XmlList(entry: 'Service')]
    #[Serializer\SerializedName('Services')]
    private array $services;

    public function getMethodName(): string
    {
        return 'GetServices';
    }

    public function getServices(): array
    {
        return $this->services;
    }
}
