<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService;


use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\AbstractSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Request\GetProgramsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Request\GetProgramsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Response\GetProgramsResult;

class SiteServiceSOAPRequester extends AbstractSOAPRequester
{
    const SERVICE_URI = 'https://api.mindbodyonline.com/0_5_1/SiteService.asmx';

    public function getLocations(): array
    {
        return $this->minbodySoapRequester->createEnvelopeAndExecuteRequest(
            self::SERVICE_URI,
            'GetLocations',
            [],
            false
        );
    }

    public function getPrograms(GetProgramsParamsRequest $request): GetProgramsResult{
        return $this->executeRequest(
            GetProgramsRequest::class,
            GetProgramsResult::class,
            'GetPrograms',
            self::SERVICE_URI,
            $request
        );
    }
}
