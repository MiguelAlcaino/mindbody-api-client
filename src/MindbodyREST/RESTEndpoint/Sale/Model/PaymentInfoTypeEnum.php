<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model;

enum PaymentInfoTypeEnum: string
{
    case CUSTOM    = 'Custom';
    case GIFT_CARD = 'GiftCard';
}
