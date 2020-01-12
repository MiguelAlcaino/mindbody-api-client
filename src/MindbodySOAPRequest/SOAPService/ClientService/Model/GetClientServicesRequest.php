<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAPRequest\SOAPService\ClientService\Model;

class GetClientServicesRequest implements \JsonSerializable
{
    /** @var string */
    private $ClientID;

    /** @var array */
    private $ProgramIDs;

    /** @var int */
    private $ClassID;

    /** @var boolean */
    private $ShowActiveOnly;

    public function __construct(string $ClientID, array $ProgramIDs)
    {
        $this->ClientID   = $ClientID;
        $this->ProgramIDs = $ProgramIDs;
    }

    public function jsonSerialize()
    {
        $jsonArray = [
            'ClientID'   => $this->ClientID,
            'ProgramIDs' => [
                'int' => $this->ProgramIDs,
            ],
        ];

        if ($this->ClassID !== null) {
            $jsonArray['ClassID'] = $this->ClassID;
        }

        if ($this->ShowActiveOnly !== null) {
            $jsonArray['ShowActiveOnly'] = $this->ShowActiveOnly;
        }

        return $jsonArray;
    }

    public function getClassID(): ?int
    {
        return $this->ClassID;
    }

    public function setClassID(int $ClassID): GetClientServicesRequest
    {
        $this->ClassID = $ClassID;

        return $this;
    }

    public function getClientID(): string
    {
        return $this->ClientID;
    }

    public function getProgramIDs(): array
    {
        return $this->ProgramIDs;
    }

    public function isShowActiveOnly(): ?bool
    {
        return $this->ShowActiveOnly;
    }

    /**
     * @param bool $ShowActiveOnly
     *
     * @return GetClientServicesRequest
     */
    public function setShowActiveOnly(bool $ShowActiveOnly): GetClientServicesRequest
    {
        $this->ShowActiveOnly = $ShowActiveOnly;

        return $this;
    }
}
