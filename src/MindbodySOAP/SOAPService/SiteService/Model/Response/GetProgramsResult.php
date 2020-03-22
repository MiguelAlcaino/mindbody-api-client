<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Response;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;
use JMS\Serializer\Annotation as Serializer;

class GetProgramsResult extends AbstractBaseResultResponse
{
    /**
     * @var Program[]
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Response\Program>")
     * @Serializer\XmlList(entry="Program")
     * @Serializer\SerializedName("Programs")
     */
    private $programs;

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