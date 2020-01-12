<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAPRequest\SOAPService\ClientService\Model;

use JsonSerializable;

class AddOrUpdateClientsRequest implements JsonSerializable
{
    /** @var Client[] */
    private $clients;

    public function __construct(array $clients)
    {
        $this->clients = $clients;
    }

    public function jsonSerialize()
    {
        return [
            'Clients' => [
                'Client' => $this->clients,
            ],
        ];
    }
}
