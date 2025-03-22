<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;

class GETGiftCardsRequest extends RESTRequest implements UserStaffTokenRequiredInterface
{
    use UserStaffTokenRequiredTrait;

    #[Serializer\SerializedName("Ids")]
    private ?array $ids = null;

    #[Serializer\SerializedName("LocationId")]
    private ?int $locationId = null;

    #[Serializer\SerializedName("SoldOnline")]
    private ?bool $soldOnline = null;

    public function getIds(): ?array
    {
        return $this->ids;
    }

    public function setIds(?array $ids): self
    {
        $this->ids = $ids;

        return $this;
    }

    public function getLocationId(): ?int
    {
        return $this->locationId;
    }

    public function setLocationId(?int $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }

    public function getSoldOnline(): ?bool
    {
        return $this->soldOnline;
    }

    public function setSoldOnline(?bool $soldOnline): self
    {
        $this->soldOnline = $soldOnline;

        return $this;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getPath(): string
    {
        return 'sale/giftcards';
    }
}
