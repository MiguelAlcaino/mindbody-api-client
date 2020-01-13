<?php

namespace MiguelAlcaino\MindbodyApiClient\Credentials;

class MindbodyCredentials
{
    /** @var string */
    private $sourceName;

    /** @var string */
    private $sourcePassword;

    /** @var string */
    private $adminUser;

    /** @var string */
    private $adminPassword;

    /** @var array */
    private $siteIds;

    public function __construct($sourceName, $sourcePassword, $adminUser, $adminPassword, array $siteIds)
    {
        $this->sourceName     = $sourceName;
        $this->sourcePassword = $sourcePassword;
        $this->adminUser      = $adminUser;
        $this->adminPassword  = $adminPassword;
        $this->siteIds        = $siteIds;
    }

    /**
     * @return string
     */
    public function getSourceName(): string
    {
        return $this->sourceName;
    }

    /**
     * @return string
     */
    public function getSourcePassword(): string
    {
        return $this->sourcePassword;
    }

    /**
     * @return string
     */
    public function getAdminUser(): string
    {
        return $this->adminUser;
    }

    /**
     * @return string
     */
    public function getAdminPassword(): string
    {
        return $this->adminPassword;
    }

    /**
     * @return array
     */
    public function getSiteIds(): array
    {
        return $this->siteIds;
    }
}
