<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\AbstractSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Request\GetProgramsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Request\GetProgramsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Response\GetProgramsResult;
use RuntimeException;

class SiteServiceSOAPRequester extends AbstractSOAPRequester
{
    public const SERVICE_URI = 'https://api.mindbodyonline.com/0_5_1/SiteService.asmx';

    /**
     * @deprecated This method is deprecated and should not be used. Use REST API instead.
     *
     * @throws RuntimeException
     */
    public function getLocations(): array
    {
        throw new RuntimeException('This method is deprecated and should not be used. Please use the REST API instead.');
    }

    public function getPrograms(GetProgramsParamsRequest $request): GetProgramsResult
    {
        return $this->executeRequest(
            GetProgramsRequest::class,
            GetProgramsResult::class,
            'GetPrograms',
            self::SERVICE_URI,
            $request,
        );
    }
}
