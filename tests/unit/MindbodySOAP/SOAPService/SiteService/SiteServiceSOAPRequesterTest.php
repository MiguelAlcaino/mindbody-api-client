<?php

namespace MindbodySOAP\SOAPService\SiteService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Request\GetProgramsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\SiteServiceSOAPRequester;
use MiguelAlcainoTest\MindbodyApiClient\Unit\MindbodySOAP\Helper\MindbodySerializerTestTrait;
use PHPUnit\Framework\TestCase;

class SiteServiceSOAPRequesterTest extends TestCase
{
    use MindbodySerializerTestTrait;

    public function testGetPrograms()
    {
        $requester = $this->getSiteServiceSoapRequester();

        $response = $requester->getPrograms(new GetProgramsParamsRequest());

        $this->addToAssertionCount(1);
    }

    private function getSiteServiceSoapRequester()
    {
        return new SiteServiceSOAPRequester(
            $this->getMindbodySoapRequester(),
            $this->getMindbodySerializer()
        );
    }
}
