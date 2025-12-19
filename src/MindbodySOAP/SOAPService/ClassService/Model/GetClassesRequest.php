<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClassService\Model;

use DateTimeImmutable;
use JsonSerializable;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\AbstractSOAPRequester;

class GetClassesRequest implements JsonSerializable
{
    /**
     * @var int[]
     */
    private $ClassIDs;

    /**
     * @var DateTimeImmutable
     */
    private $StartDateTime;

    /**
     * @var DateTimeImmutable
     */
    private $EndDateTime;

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $jsonArray = [];

        if (null !== $this->ClassIDs) {
            $jsonArray['ClassIDs'] = [
                'int' => $this->ClassIDs,
            ];
        }

        if (null !== $this->StartDateTime) {
            $jsonArray['StartDateTime'] = $this->StartDateTime->format(AbstractSOAPRequester::DATE_MINDBODY_FORMAT);
        }

        if (null !== $this->EndDateTime) {
            $jsonArray['EndDateTime'] = $this->EndDateTime->format(AbstractSOAPRequester::DATE_MINDBODY_FORMAT);
        }

        return $jsonArray;
    }

    /**
     * @return int[]|null
     */
    public function getClassIDs(): ?array
    {
        return $this->ClassIDs;
    }

    /**
     * @param int[] $ClassIDs
     */
    public function setClassIDs(array $ClassIDs): GetClassesRequest
    {
        $this->ClassIDs = $ClassIDs;

        return $this;
    }

    public function getStartDateTime(): ?DateTimeImmutable
    {
        return $this->StartDateTime;
    }

    public function setStartDateTime(DateTimeImmutable $StartDateTime): GetClassesRequest
    {
        $this->StartDateTime = $StartDateTime;

        return $this;
    }

    public function getEndDateTime(): ?DateTimeImmutable
    {
        return $this->EndDateTime;
    }

    public function setEndDateTime(DateTimeImmutable $EndDateTime): GetClassesRequest
    {
        $this->EndDateTime = $EndDateTime;

        return $this;
    }
}
