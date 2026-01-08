<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Enum;

enum ItemTypeEnum: string
{
    case SERVICE = 'Service';
    case PRODUCT = 'Product';
    case PACKAGE = 'Package';
    case TIP     = 'Tip';
}
