<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Model\MindbodyPaginatedResultTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;
use JMS\Serializer\Annotation as Serializer;

class GetClientServicesResult extends AbstractBaseResultResponse
{
    use MindbodyPaginatedResultTrait;

    /**
     * @var ClientService[]
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\ClientService>")
     * @Serializer\XmlList(entry="ClientService")
     * @Serializer\SerializedName("ClientServices")
     */
    private $clientServices;

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