<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Enum;

enum PaymentInfoTypeEnum: string
{
    case CUSTOM_PAYMENT_INFO = 'CustomPaymentInfo';
    case STORED_CARD_INFO = 'StoredCardInfo';
    case ENCRYPTED_TRACK_DATA_INFO = 'EncryptedTrackDataInfo';
    case TRACK_DATA_INFO = 'TrackDataInfo';
    case DEBIT_ACCOUNT_INFO = 'DebitAccountInfo';
    case COMP_INFO = 'CompInfo';
    case CASH_INFO = 'CashInfo';
    case CHECK_INFO = 'CheckInfo';
    case GIFT_CARD_INFO = 'GiftCardInfo';
}
