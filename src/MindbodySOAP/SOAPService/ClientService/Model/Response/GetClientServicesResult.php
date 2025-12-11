<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Model\MindbodyPaginatedResultTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;

class GetClientServicesResult extends AbstractBaseResultResponse
{
    use MindbodyPaginatedResultTrait;

    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\ClientService>")]
    #[Serializer\XmlList(entry: 'ClientService')]
    #[Serializer\SerializedName('ClientServices')]
    private array $clientServices;

    public function getMethodName(): string
    {
        return 'GetClientServices';
    }

    /**
     * @return ClientService[]
     */
    public function getClientServices(): array
    {
        return $this->clientServices;
    }
}
