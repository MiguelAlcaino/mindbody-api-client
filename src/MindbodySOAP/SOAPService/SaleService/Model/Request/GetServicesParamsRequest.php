<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractParamsRequest;

class GetServicesParamsRequest extends AbstractParamsRequest
{
    #[Serializer\SerializedName('ProgramIDs')]
    #[Serializer\XmlList(entry: 'int')]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\SkipWhenEmpty]
    private $programIds;

    #[Serializer\SerializedName('SessionTypeIDs')]
    #[Serializer\XmlList(entry: 'int')]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\SkipWhenEmpty]
    private array $sessionTypeIds;

    #[Serializer\SerializedName('ServiceIDs')]
    #[Serializer\XmlList(entry: 'string')]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\SkipWhenEmpty]
    private $serviceIds;

    #[Serializer\SerializedName('ClassID')]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('int')]
    private int $classId;

    #[Serializer\SerializedName('ClassScheduleID')]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('int')]
    private $classScheduleID;

    #[Serializer\SerializedName('SellOnline')]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('bool')]
    private bool $sellOnline;

    #[Serializer\SerializedName('LocationID')]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('int')]
    private $locationId;

    #[Serializer\SerializedName('HideRelatedPrograms')]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('bool')]
    private bool $hideRelatedPrograms;

    #[Serializer\SerializedName('StaffID')]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('int')]
    private int $staffId;
}
