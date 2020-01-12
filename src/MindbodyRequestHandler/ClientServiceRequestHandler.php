<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyRequestHandler;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAPRequest\ClientServiceSOAPRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAPRequest\SOAPService\ClientService\Model\GetClientServicesRequest;

class ClientServiceRequestHandler
{
    /**
     * @var ClientServiceSOAPRequester
     */
    private $clientServiceSOAPRequester;

    /**
     * ClientServiceRequestHandler constructor.
     *
     * @param ClientServiceSOAPRequester $clientServiceSOAPRequester
     */
    public function __construct(ClientServiceSOAPRequester $clientServiceSOAPRequester)
    {
        $this->clientServiceSOAPRequester = $clientServiceSOAPRequester;
    }

    /**
     * @param GetClientServicesRequest $getClientServicesRequest
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getClientServicesFormatted(GetClientServicesRequest $getClientServicesRequest): array
    {
        $clientServices = $this->clientServiceSOAPRequester->getClientServices($getClientServicesRequest);

        $clientServicesFormatted = [];

        if (count($clientServices['GetClientServicesResult']['ClientServices']) > 0) {
            if (
            array_key_exists(
                'Current',
                $clientServices['GetClientServicesResult']['ClientServices']['ClientService']
            )
            ) {
                $clientService             = $clientServices['GetClientServicesResult']['ClientServices']['ClientService'];
                $clientServicesFormatted[] = [
                    'current'        => $clientService['Current'],
                    'id'             => $clientService['ID'],
                    'name'           => $clientService['Name'],
                    'paymentDate'    => $clientService['PaymentDate'],
                    'activeDate'     => $clientService['ActiveDate'],
                    'expirationDate' => $clientService['ExpirationDate'],
                ];
            } else {
                foreach ($clientServices['GetClientServicesResult']['ClientServices']['ClientService'] as $clientService) {
                    $clientServicesFormatted[] = [
                        'current'        => $clientService['Current'],
                        'id'             => $clientService['ID'],
                        'name'           => $clientService['Name'],
                        'paymentDate'    => $clientService['PaymentDate'],
                        'activeDate'     => $clientService['ActiveDate'],
                        'expirationDate' => $clientService['ExpirationDate'],
                    ];
                }
            }
        }

        return $clientServicesFormatted;
    }

    /**
     * @param GetClientServicesRequest $getClientServicesRequest
     *
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function canClientBookClass(GetClientServicesRequest $getClientServicesRequest): bool
    {
        $getClientServicesRequest->setShowActiveOnly(true);
        $clientServices = $this->getClientServicesFormatted($getClientServicesRequest);

        return count($clientServices) > 0;
    }
}
