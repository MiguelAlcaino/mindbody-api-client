<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\GiftCard;

class GETGiftCardsResponse
{
    /**
     * @Serializer\SerializedName("GiftCards")
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\GiftCard>")
     * @var ?GiftCard[]
     */
    private ?array $giftCards;

    public function getGiftCards(): ?array
    {
        return $this->giftCards;
    }
}
