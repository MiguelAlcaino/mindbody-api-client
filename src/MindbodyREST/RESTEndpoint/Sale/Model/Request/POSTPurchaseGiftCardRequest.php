<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\Request;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\UserStaffTokenRequiredInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\UserStaffTokenRequiredTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model\PaymentInfo;

class POSTPurchaseGiftCardRequest extends RESTRequest implements UserStaffTokenRequiredInterface
{
    use UserStaffTokenRequiredTrait;

    public function __construct(
        #[Serializer\SerializedName('LocationId')]
        private readonly int         $locationId,
        #[Serializer\SerializedName('PurchaserClientId')]
        private readonly int         $purchaserClientId,
        #[Serializer\SerializedName('GiftCardId')]
        private readonly int         $giftCardId,
        #[Serializer\SerializedName('SendEmailReceipt')]
        private readonly bool        $sendEmailReceipt,
        #[Serializer\SerializedName('RecipientEmail')]
        private readonly string      $recipientEmail,
        #[Serializer\SerializedName('RecipientName')]
        private readonly string      $recipientName,
        #[Serializer\SerializedName('PaymentInfo')]
        private readonly PaymentInfo $paymentInfo,
    ) {
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getPath(): string
    {
        return 'sale/purchasegiftcard';
    }
}
