<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SiteService;


use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\AbstractSOAPRequester;

class SiteServiceSOAPRequest extends AbstractSOAPRequester
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
}
