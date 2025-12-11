<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;

class SourceCredentialsFactory extends AbstractCredentials
{
    /**
     * @param int[] $siteIds
     */
    public function __construct(
        private readonly string $sourceName,
        string $sourcePassword,
        array $siteIds
    )
    {
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
