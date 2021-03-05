<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodySOAP\SOAPService\SiteService;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\BaseRequester\MindbodySOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Request\GetProgramsParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\SiteServiceSOAPRequester;
use MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodySOAP\Helper\MindbodyUtilsTrait;
use PHPUnit\Framework\TestCase;

class SiteServiceSOAPRequesterTest extends TestCase
{
    use MindbodyUtilsTrait;

    public function testGetPrograms()
    {
        $requester = $this->getSiteServiceSoapRequester();

        $response = $requester->getPrograms(new GetProgramsParamsRequest());

        $programs = $response->getPrograms();
        self::assertGreaterThan(0, count($programs));
    }

    private function getSiteServiceSoapRequester()
    {
        return new SiteServiceSOAPRequester(
            new MindbodySOAPRequester(),
            $this->getMindbodySerializer(),
            $this->getSourceCredentials(),
            $this->getUserCredentials()
        );
    }
}
