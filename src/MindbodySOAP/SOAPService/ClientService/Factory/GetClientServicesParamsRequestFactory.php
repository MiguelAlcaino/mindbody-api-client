<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Factory;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Request\GetClientServicesParamsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\SiteService\Model\Response\Program;

class GetClientServicesParamsRequestFactory
{
    /**
     * @param Program[] $programs
     */
    public static function createFromPrograms(string $clientId, array $programs): GetClientServicesParamsRequest
    {
        return new GetClientServicesParamsRequest(
            $clientId, array_map(
                         function (Program $program) {
                             return $program->getId();
                         },
                         $programs
                     )
        );
    }
}