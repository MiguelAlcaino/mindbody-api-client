<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\CartItem;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\PaymentInfo;

class POSTCheckoutShoppingCartRequest extends RESTRequest implements UserStaffTokenRequiredInterface
{
    use UserStaffTokenRequiredTrait;

    #[Serializer\SerializedName('CartId')]
    #[Serializer\SkipWhenEmpty]
    private ?string $cartId;

    #[Serializer\SerializedName('ClientId')]
    private string $clientId;

    /**
     * @var array<CartItem>
     */
    #[Serializer\SerializedName('Items')]
    #[Serializer\Type('array<' . CartItem::class . '>')]
    private array $items;

    /**
     * @var array<PaymentInfo>
     */
    #[Serializer\SerializedName('Payments')]
    private array $payments;

    #[Serializer\SerializedName('PromotionCode')]
    #[Serializer\SkipWhenEmpty]
    private ?string $promotionCode;

    #[Serializer\SerializedName('InStore')]
    #[Serializer\SkipWhenEmpty]
    private ?bool $inStore;

    #[Serializer\SerializedName('SendEmail')]
    #[Serializer\SkipWhenEmpty]
    private ?bool $sendEmail;

    /**
     * @param CartItem[] $items
     * @param PaymentInfo[] $payments
     */
    public function __construct(
        string $clientId,
        array  $items,
        array  $payments
    )
    {
        $this->clientId      = $clientId;
        $this->items         = $items;
        $this->payments      = $payments;
        $this->cartId        = null;
        $this->promotionCode = null;
        $this->inStore       = null;
        $this->sendEmail     = null;
    }

    public function setCartId(?string $cartId): self
    {
        $this->cartId = $cartId;

        return $this;
    }

    public function setPromotionCode(?string $promotionCode): self
    {
        $this->promotionCode = $promotionCode;

        return $this;
    }

    public function setInStore(?bool $inStore): self
    {
        $this->inStore = $inStore;

        return $this;
    }

    public function setSendEmail(?bool $sendEmail): self
    {
        $this->sendEmail = $sendEmail;

        return $this;
    }

    /**
     * @return array<PaymentInfo>
     */
    public function getPayments(): array
    {
        return $this->payments;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getPath(): string
    {
        return 'sale/checkoutshoppingcart';
    }
}
