<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodySOAP\Helper;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Deserializer\MindbodyDeserializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Factory\JmsSerializerFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Serializer\MindbodySerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\UserCredentials;

trait MindbodyUtilsTrait
{
    public function getMindbodySerializer(bool $useFreeClient = true)
    {
        $siteIds        = $useFreeClient ? json_decode($_SERVER['MINDBODY_FREE_API_SITE_IDS']) : json_decode($_SERVER['MINDBODY_SITE_IDS']);
        $sourceName     = $useFreeClient ? $_SERVER['MINDBODY_FREE_API_SOURCE_NAME'] : $_SERVER['MINDBODY_SOURCE_NAME'];
        $sourcePassword = $useFreeClient ? $_SERVER['MINDBODY_FREE_API_SOURCE_PASSWORD'] : $_SERVER['MINDBODY_SOURCE_PASSWORD'];
        $adminUser      = $useFreeClient ? $_SERVER['MINDBODY_FREE_API_ADMIN_USER'] : $_SERVER['MINDBODY_ADMIN_USER'];
        $adminPassword  = $useFreeClient ? $_SERVER['MINDBODY_FREE_API_ADMIN_PASSWORD'] : $_SERVER['MINDBODY_ADMIN_PASSWORD'];

        $jmsSerializerFactory = new JmsSerializerFactory();
        $jmsSerializer        = $jmsSerializerFactory->create();

        return new MindbodySerializer(
            $jmsSerializer,
            new MindbodyDeserializer($jmsSerializer),
            new SourceCredentials(
                $sourceName,
                $sourcePassword,
                $siteIds
            ), new UserCredentials(
                $adminUser,
                $adminPassword,
                $siteIds
            )
        );
    }

    private function getTestUsername(): string
    {
        return $_SERVER['MINDBODY_TEST_CLIENT_EMAIL'];
    }

    private function getTestUserPassword(): string
    {
        return $_SERVER['MINDBODY_TEST_CLIENT_PASSWORD'];
    }

    private function getTestUserId(): string
    {
        return $_SERVER['MINDBODY_TEST_CLIENT_ID'];
    }

    private function getClientWithPurchasesId(): string
    {
        return $_SERVER['MINDBODY_TEST_USER_WITH_PURCHASES_ID'];
    }

    private function getPromoCode(): string
    {
        return $_SERVER['MINDBODY_TEST_PROMOCODE'];
    }
}
