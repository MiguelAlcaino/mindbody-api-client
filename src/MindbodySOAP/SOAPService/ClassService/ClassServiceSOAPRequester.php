<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClassService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\AbstractSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClassService\Model\AddClientToClassRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClassService\Model\GetClassDescriptionsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClassService\Model\GetClassesRequest;

class ClassServiceSOAPRequester extends AbstractSOAPRequester
{
    private const SERVICE_URI = 'https://api.mindbodyonline.com/0_5_1/ClassService.asmx';

    public function getClasses(GetClassesRequest $request): array
    {
        return $this->minbodySoapRequester->createEnvelopeAndExecuteRequest(
            self::SERVICE_URI,
            'GetClasses',
            $this->decodeRequesterObject($request)
        );
    }

    public function addClientToClass(AddClientToClassRequest $request): array
    {
        return $this->minbodySoapRequester->createEnvelopeAndExecuteRequest(
            self::SERVICE_URI,
            'AddClientToClass',
            $this->decodeRequesterObject($request)
        );
    }

    public function getClassDescriptions(GetClassDescriptionsRequest $request = null): array
    {
        return $this->minbodySoapRequester->createEnvelopeAndExecuteRequest(
            self::SERVICE_URI,
            'GetClassDescriptions',
            $this->decodeRequesterObject($request)
        );
    }
}
