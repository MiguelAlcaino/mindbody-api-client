<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractSOAPMethod;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\RequestContainer;
use JMS\Serializer\Annotation as Serializer;

class GetClientPurchasesRequest extends AbstractSOAPMethod
{
    /**
     * @var RequestContainer
     */
    #[Serializer\SerializedName("GetClientPurchases")]
    protected $soapMethodName;
}
