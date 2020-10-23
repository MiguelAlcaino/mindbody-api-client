<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;

class GetClientVisitsResult extends AbstractBaseResultResponse
{
    /**
     * @var Visit[]
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\Visit>")
     * @Serializer\XmlList(entry="Visit")
     * @Serializer\SerializedName("Visits")
     */
    private $visits;

    public function getVisits(): array
    {
        return $this->visits;
    }

    public function getMethodName(): string
    {
        return 'GetClientVisits';
    }

}
