<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;

class GetCustomPaymentMethodsResult extends AbstractBaseResultResponse
{
    #[Serializer\SerializedName("PaymentMethods")]
    #[Serializer\XmlList(entry: "CustomPaymentInfo")]
    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SaleService\Model\Response\CustomPaymentInfo>")]
    private array $paymentMethods;

    /**
     * @return CustomPaymentInfo[]
     */
    public function getPaymentMethods(): array
    {
        return $this->paymentMethods;
    }

    public function getMethodName(): string
    {
        return 'GetCustomPaymentMethods';
    }
}
