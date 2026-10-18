<?php

declare(strict_types=1);

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodyREST\RESTEndpoint\Sale\Model;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\CartItem;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\CartItemMetadata;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Item;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\ItemTypeEnum;
use PHPUnit\Framework\TestCase;

class CartItemSerializationTest extends TestCase
{
    private SerializerInterface $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = SerializerBuilder::create()->build();
    }

    public function testOmitsSalesNotesWhenNotSet(): void
    {
        $cartItem = $this->createCartItem();

        $this->assertNull($cartItem->getSalesNotes());
        $this->assertSame(
            ['Item' => ['Type' => 'Service', 'Metadata' => ['Id' => 1234]], 'Quantity' => 1],
            $this->serializeToArray($cartItem),
        );
    }

    public function testOmitsSalesNotesWhenSetBackToNull(): void
    {
        $cartItem = $this->createCartItem()
            ->setSalesNotes('crank-ref-1')
            ->setSalesNotes(null);

        $this->assertArrayNotHasKey('SalesNotes', $this->serializeToArray($cartItem));
    }

    public function testSerializesSalesNotesWhenSet(): void
    {
        $cartItem = $this->createCartItem()->setSalesNotes('crank-ref-1');

        $this->assertSame('crank-ref-1', $cartItem->getSalesNotes());
        $this->assertSame(
            [
                'Item'       => ['Type' => 'Service', 'Metadata' => ['Id' => 1234]],
                'Quantity'   => 1,
                'SalesNotes' => 'crank-ref-1',
            ],
            $this->serializeToArray($cartItem),
        );
    }

    private function createCartItem(): CartItem
    {
        return new CartItem(new Item(ItemTypeEnum::SERVICE, new CartItemMetadata(1234)), 1);
    }

    /**
     * @return array<string, mixed>
     */
    private function serializeToArray(CartItem $cartItem): array
    {
        return json_decode($this->serializer->serialize($cartItem, 'json'), true);
    }
}
