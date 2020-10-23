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
        $siteIds        = $useFreeClient ? json_decode($_ENV['MINDBODY_FREE_API_SITE_IDS']) : json_decode($_ENV['MINDBODY_SITE_IDS']);
        $sourceName     = $useFreeClient ? $_ENV['MINDBODY_FREE_API_SOURCE_NAME'] : $_ENV['MINDBODY_SOURCE_NAME'];
        $sourcePassword = $useFreeClient ? $_ENV['MINDBODY_FREE_API_SOURCE_PASSWORD'] : $_ENV['MINDBODY_SOURCE_PASSWORD'];
        $adminUser      = $useFreeClient ? $_ENV['MINDBODY_FREE_API_ADMIN_USER'] : $_ENV['MINDBODY_ADMIN_USER'];
        $adminPassword  = $useFreeClient ? $_ENV['MINDBODY_FREE_API_ADMIN_PASSWORD'] : $_ENV['MINDBODY_ADMIN_PASSWORD'];

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
        return $_ENV['MINDBODY_TEST_CLIENT_EMAIL'];
    }

    private function getTestUserPassword(): string
    {
        return $_ENV['MINDBODY_TEST_CLIENT_PASSWORD'];
    }

    private function getTestUserId(): string
    {
        return $_ENV['MINDBODY_TEST_CLIENT_ID'];
    }

    private function getClientWithPurchasesId(): string
    {
        return $_ENV['MINDBODY_TEST_USER_WITH_PURCHASES_ID'];
    }

    private function getPromoCode(): string
    {
        return $_ENV['MINDBODY_TEST_PROMOCODE'];
    }
}
