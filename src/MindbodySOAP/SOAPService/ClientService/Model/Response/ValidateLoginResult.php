<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Response\AbstractBaseResultResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client;

class ValidateLoginResult extends AbstractBaseResultResponse
{
    #[Serializer\SerializedName('GUID')]
    #[Serializer\Type('string')]
    #[Serializer\XmlElement(cdata: false)]
    private $guid;

    #[Serializer\SerializedName('Client')]
    #[Serializer\Type("MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Client")]
    private ?Client $client;

    public function getMethodName(): string
    {
        return 'ValidateLogin';
    }

    public function getGuid(): ?string
    {
        return $this->guid;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }
}
