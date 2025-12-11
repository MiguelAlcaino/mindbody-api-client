<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Factory;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\AbstractCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\UserCredentials;

class UserCredentialsFactory extends AbstractCredentials
{
    /** @var string */
    private $username;

    /**
     * @param int[] $siteIds
     */
    public function __construct(string $username, string $sourcePassword, array $siteIds)
    {
        $this->username = $username;
        parent::__construct($sourcePassword, $siteIds);
    }

    public function create(): UserCredentials
    {
        return new UserCredentials(
            $this->username,
            $this->getPassword(),
            $this->getSiteIds()
        );
    }
}
