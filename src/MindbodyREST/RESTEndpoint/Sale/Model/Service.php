<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model;

use JMS\Serializer\Annotation as Serializer;

class Service
{
    #[Serializer\SerializedName('Id')]
    private int $id;

    #[Serializer\SerializedName('Name')]
    private string $name;

    #[Serializer\SerializedName('Price')]
    private float $price;

    #[Serializer\SerializedName('OnlinePrice')]
    private float $onlinePrice;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getOnlinePrice(): float
    {
        return $this->onlinePrice;
    }
}
