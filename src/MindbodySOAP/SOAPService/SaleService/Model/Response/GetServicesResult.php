<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Model\MindbodyPaginatedResultTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;
use JMS\Serializer\Annotation as Serializer;

class GetServicesResult extends AbstractBaseResultResponse
{

    use MindbodyPaginatedResultTrait;

    /**
     * @var Service[]
     * @Serializer\Type ("array<MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response\Service>")
     * @Serializer\XmlList(entry="Service")
     * @Serializer\SerializedName("Services")
     */
    private $services;

    public function getMethodName(): string
    {
        return 'GetServices';
    }

    public function getServices(): array
    {
        return $this->services;
    }
}
