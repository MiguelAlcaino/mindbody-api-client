<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Model;

use JMS\Serializer\Annotation as Serializer;

class PricingRelationships
{
    /**
     * @var array<int>
     */
    #[Serializer\SerializedName('PaysFor')]
    #[Serializer\Type('array<int>')]
    private array $paysFor;

    /**
     * @var array<int>
     */
    #[Serializer\SerializedName('PaidBy')]
    #[Serializer\Type('array<int>')]
    private array $paidBy;

    /**
     * @return array<int>
     */
    public function getPaysFor(): array
    {
        return $this->paysFor;
    }

    /**
     * @return array<int>
     */
    public function getPaidBy(): array
    {
        return $this->paidBy;
    }
}
