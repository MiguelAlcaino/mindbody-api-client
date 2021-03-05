<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodySOAP\Helper;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Deserializer\MindbodyDeserializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Factory\JmsSerializerFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Serializer\MindbodySerializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\SourceCredentials;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\UserCredentials;

trait MindbodyUtilsTrait
{
    public function getMindbodySerializer()
    {
        $jmsSerializerFactory = new JmsSerializerFactory();
        $jmsSerializer        = $jmsSerializerFactory->create();

        return new MindbodySerializer(
            $jmsSerializer,
            new MindbodyDeserializer($jmsSerializer)
        );
    }

    public function getSourceCredentials(bool $useFreeClient = true): SourceCredentials
    {
        return new SourceCredentials(
            $useFreeClient ? $_SERVER['MINDBODY_FREE_API_SOURCE_NAME'] : $_SERVER['MINDBODY_SOURCE_NAME'],
            $useFreeClient ? $_SERVER['MINDBODY_FREE_API_SOURCE_PASSWORD'] : $_SERVER['MINDBODY_SOURCE_PASSWORD'],
            $this->getSiteIds($useFreeClient)
        );
    }

    public function getUserCredentials(bool $useFreeClient = true): UserCredentials
    {
        return new UserCredentials(
            $useFreeClient ? $_SERVER['MINDBODY_FREE_API_ADMIN_USER'] : $_SERVER['MINDBODY_ADMIN_USER'],
            $useFreeClient ? $_SERVER['MINDBODY_FREE_API_ADMIN_PASSWORD'] : $_SERVER['MINDBODY_ADMIN_PASSWORD'],
            $this->getSiteIds($useFreeClient)
        );
    }

    private function getSiteIds(bool $useFreeClient = true)
    {
        return $useFreeClient ? json_decode($_SERVER['MINDBODY_FREE_API_SITE_IDS']) : json_decode($_SERVER['MINDBODY_SITE_IDS']);
    }

    private function getAdminUsername(): string
    {
        return $_SERVER['MINDBODY_ADMIN_USER'];
    }

    private function getAdminPassword(): string
    {
        return $_SERVER['MINDBODY_ADMIN_PASSWORD'];
    }

    private function getApiKey(): string
    {
        return $_SERVER['MINDBODY_REST_API_KEY'];
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
