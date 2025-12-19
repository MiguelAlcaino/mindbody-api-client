<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClassService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\AbstractSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClassService\Model\AddClientToClassRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClassService\Model\GetClassDescriptionsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClassService\Model\GetClassesRequest;
use RuntimeException;

class ClassServiceSOAPRequester extends AbstractSOAPRequester
{
    /**
     * @deprecated This method is deprecated and should not be used. Use REST API instead.
     *
     * @throws RuntimeException
     */
    public function getClasses(GetClassesRequest $request): array
    {
        throw new RuntimeException('This method is deprecated and should not be used. Please use the REST API instead.');
    }

    /**
     * @deprecated This method is deprecated and should not be used. Use REST API instead.
     *
     * @throws RuntimeException
     */
    public function addClientToClass(AddClientToClassRequest $request): array
    {
        throw new RuntimeException('This method is deprecated and should not be used. Please use the REST API instead.');
    }

    /**
     * @deprecated This method is deprecated and should not be used. Use REST API instead.
     *
     * @throws RuntimeException
     */
    public function getClassDescriptions(?GetClassDescriptionsRequest $request = null): array
    {
        throw new RuntimeException('This method is deprecated and should not be used. Please use the REST API instead.');
    }
}
