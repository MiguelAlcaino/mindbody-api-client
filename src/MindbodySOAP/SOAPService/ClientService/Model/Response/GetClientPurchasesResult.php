<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Model\MindbodyPaginatedResultTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;
use JMS\Serializer\Annotation as Serializer;

class GetClientPurchasesResult extends AbstractBaseResultResponse
{
    use MindbodyPaginatedResultTrait;

    /**
     * @var SaleItem[]
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\SaleItem>")
     * @Serializer\XmlList(entry="SaleItem")
     * @Serializer\SerializedName("Purchases")
     */
    private $purchases;

    public function getMethodName(): string
    {
        return 'GetClientPurchases';
    }
}