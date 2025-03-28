<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractParamsRequest;

class GetProgramsParamsRequest extends AbstractParamsRequest
{
    #[Serializer\SerializedName("OnlineOnly")]
    #[Serializer\Type("bool")]
    #[Serializer\XmlElement(cdata: false)]
    private $onlineOnly;

    #[Serializer\SerializedName("ScheduleType")]
    #[Serializer\Type("string")]
    #[Serializer\XmlElement(cdata: false)]
    private string $scheduleType;

    public function __construct(bool $onlineOnly = true, string $scheduleType = 'All')
    {
        $this->onlineOnly   = $onlineOnly;
        $this->scheduleType = $scheduleType;
    }
}
