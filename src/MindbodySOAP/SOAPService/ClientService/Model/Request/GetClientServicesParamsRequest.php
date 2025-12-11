<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Model\MindbodyPaginatedRequestTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractParamsRequest;

class GetClientServicesParamsRequest extends AbstractParamsRequest
{
    use MindbodyPaginatedRequestTrait;

    #[Serializer\SerializedName("ClientID")]
    #[Serializer\Type("string")]
    #[Serializer\XmlElement(cdata: false)]
    private $clientId;

    #[Serializer\XmlList(entry: "int")]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\SerializedName("ProgramIDs")]
    private array $programIds;

    #[Serializer\SerializedName("ClassID")]
    #[Serializer\Type("string")]
    #[Serializer\XmlElement(cdata: false)]
    private $classId;

    #[Serializer\SerializedName("ShowActiveOnly")]
    #[Serializer\Type("bool")]
    #[Serializer\XmlElement(cdata: false)]
    private bool $showActiveOnly;

    /**
     * @param int[] $programIds
     */
    public function __construct(string $clientId, array $programIds)
    {
        $this->clientId   = $clientId;
        $this->programIds = $programIds;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getProgramIds(): array
    {
        return $this->programIds;
    }

    public function getClassId(): int
    {
        return $this->classId;
    }

    public function isShowActiveOnly(): bool
    {
        return $this->showActiveOnly;
    }

    public function setClassId(int $classId): GetClientServicesParamsRequest
    {
        $this->classId = $classId;

        return $this;
    }

    public function setShowActiveOnly(bool $showActiveOnly): GetClientServicesParamsRequest
    {
        $this->showActiveOnly = $showActiveOnly;

        return $this;
    }
}
