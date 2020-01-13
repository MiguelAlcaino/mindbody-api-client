<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;

class SourceCredentialsFactory extends AbstractCredentials
{
    /** @var string */
    private $sourceName;

    public function __construct(string $username, string $sourcePassword, array $siteIds)
    {
        $this->sourceName = $username;
        parent::__construct($sourcePassword, $siteIds);
    }

    public function create(): SourceCredentials
    {
        return new SourceCredentials(
            $this->sourceName,
            $this->getPassword(),
            $this->getSiteIds()
        );
    }
}
