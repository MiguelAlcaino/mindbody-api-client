<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\GiftCard;

class GETGiftCardsResponse extends RESTResponse
{
    /**
     * @var array<GiftCard>|null
     */
    #[Serializer\SerializedName('GiftCards')]
    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\GiftCard>")]
    private ?array $giftCards;

    /**
     * @return array<GiftCard>|null
     */
    public function getGiftCards(): ?array
    {
        return $this->giftCards;
    }
}
