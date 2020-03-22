<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Request;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestParamsInterface;
use JMS\Serializer\Annotation as Serializer;

class GetProgramsParamsRequest implements RequestParamsInterface
{
    /**
     * @var bool
     * @Serializer\SerializedName("OnlineOnly")
     * @Serializer\Type("bool")
     * @Serializer\XmlElement(cdata=false)
     */
    private $onlineOnly;

    /**
     * @var string
     * @Serializer\SerializedName("ScheduleType")
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     */
    private $scheduleType;

    public function __construct(bool $onlineOnly = true, string $scheduleType = 'All')
    {
        $this->onlineOnly   = $onlineOnly;
        $this->scheduleType = $scheduleType;
    }

}