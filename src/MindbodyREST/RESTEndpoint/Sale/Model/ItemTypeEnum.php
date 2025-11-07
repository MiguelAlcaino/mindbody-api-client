<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Sale\Model;

enum ItemTypeEnum: string
{
    case SERVICE = 'Service';
    case PRODUCT = 'Product';
    case PACKAGE = 'Package';
    case TIP = 'Tip';
}
