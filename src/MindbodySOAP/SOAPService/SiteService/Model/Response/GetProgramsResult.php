<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;

class GetProgramsResult extends AbstractBaseResultResponse
{
    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Response\Program>")]
    #[Serializer\XmlList(entry: 'Program')]
    #[Serializer\SerializedName('Programs')]
    private array $programs;

    public function getMethodName(): string
    {
        return 'GetPrograms';
    }

    /**
     * @return Program[]
     */
    public function getPrograms(): array
    {
        return $this->programs;
    }
}
