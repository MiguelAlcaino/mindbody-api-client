<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractParamsRequest;

class GetServicesParamsRequest extends AbstractParamsRequest
{
    /**
     * @var int[]
     * @Serializer\SerializedName("ProgramIDs")
     * @Serializer\XmlList(entry="int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     */
    private $programIds;

    /**
     * @var int[]
     * @Serializer\SerializedName("SessionTypeIDs")
     * @Serializer\XmlList(entry="int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     */
    private $sessionTypeIds;

    /**
     * @var string[]
     * @Serializer\SerializedName("ServiceIDs")
     * @Serializer\XmlList(entry="string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     */
    private $serviceIds;

    /**
     * @var int
     * @Serializer\SerializedName("ClassID")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("int")
     */
    private $classId;

    /**
     * @var int
     * @Serializer\SerializedName("ClassScheduleID")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("int")
     */
    private $classScheduleID;

    /**
     * @var bool
     * @Serializer\SerializedName("SellOnline")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("bool")
     */
    private $sellOnline;

    /**
     * @var int
     * @Serializer\SerializedName("LocationID")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("int")
     */
    private $locationId;

    /**
     * @var bool
     * @Serializer\SerializedName("HideRelatedPrograms")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("bool")
     */
    private $hideRelatedPrograms;

    /**
     * @var int
     * @Serializer\SerializedName("StaffID")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("int")
     */
    private $staffId;
}
