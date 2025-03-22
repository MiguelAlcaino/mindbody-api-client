<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Model\MindbodyPaginatedResultTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;
use JMS\Serializer\Annotation as Serializer;

class GetClientPurchasesResult extends AbstractBaseResultResponse
{
    use MindbodyPaginatedResultTrait;

    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\SaleItem>")]
    #[Serializer\XmlList(entry: "SaleItem")]
    #[Serializer\SerializedName("Purchases")]
    private array $purchases;

    public function getMethodName(): string
    {
        return 'GetClientPurchases';
    }

    /**
     * @return SaleItem[]
     */
    public function getPurchases(): array
    {
        return $this->purchases;
    }
}
