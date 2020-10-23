<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodySOAP\Serializer\Deserializer;

use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Deserializer\MindbodyDeserializer;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Exception\MindbodyDeserializerException;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Factory\JmsSerializerFactory;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response\GetClientsResult;
use PHPUnit\Framework\TestCase;

class MindbodyDeserializerTest extends TestCase
{
    public function testDeserialize()
    {
        $jmsSerializerFactory = new JmsSerializerFactory();
        $deserializer         = new MindbodyDeserializer(
            $jmsSerializerFactory->create()
        );
        $responseBody         = $this->getGetClientsResponse();

        /** @var GetClientsResult $response */
        $response = $deserializer->deserialize($responseBody, GetClientsResult::class);

        $this->assertEquals(200, $response->getErrorCode());
        $this->assertEquals('Success', $response->getStatus());
        $this->assertEquals('xxxx@gmail.com', $response->getClients()[0]->getEmail());
        $this->assertEquals('K', $response->getClients()[0]->getFirstName());
        $this->assertEquals('', $response->getClients()[0]->getLastName());
        $this->assertEquals(false, $response->getClients()[0]->isPromotionalEmailOptIn());
        $this->assertEquals(16517, $response->getResultCount());
        $this->assertEquals(0, $response->getCurrentPageIndex());
        $this->assertEquals(8259, $response->getTotalPageCount());
        $this->assertEquals('Full', $response->getXmlDetail());
        $this->assertEquals($responseBody, $response->getPayload());
    }

    public function testDeserializeError()
    {
        $jmsSerializerFactory = new JmsSerializerFactory();
        $deserializer         = new MindbodyDeserializer(
            $jmsSerializerFactory->create()
        );
        $responseBody         = 'mierda';

        try {
            /** @var GetClientsResult $response */
            $response = $deserializer->deserialize($responseBody, GetClientsResult::class);
        } catch (MindbodyDeserializerException $exception) {
            $this->assertEquals($responseBody, $exception->getPayload());
        }
    }

    private function getGetBadClientsResponse()
    {
        return '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope
    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
    <soap:Body>
        <GetClientsResponse
            xmlns="http://clients.mindbodyonline.com/api/0_5_1">
            <GetClientsResult>
                <Status>Error</Status>
                <ErrorCode>900</ErrorCode>
                <XMLDetail>Full</XMLDetail>
                <ResultCount>16517</ResultCount>
                <CurrentPageIndex>0</CurrentPageIndex>
                <TotalPageCount>8259</TotalPageCount>
            </GetClientsResult>
        </GetClientsResponse>
    </soap:Body>
</soap:Envelope>';
    }

    private function getGetClientsResponse()
    {
        return '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope
    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
    <soap:Body>
        <GetClientsResponse
            xmlns="http://clients.mindbodyonline.com/api/0_5_1">
            <GetClientsResult>
                <Status>Success</Status>
                <ErrorCode>200</ErrorCode>
                <XMLDetail>Full</XMLDetail>
                <ResultCount>16517</ResultCount>
                <CurrentPageIndex>0</CurrentPageIndex>
                <TotalPageCount>8259</TotalPageCount>
                <Clients>
                    <Client>
                        <Username>xxxx@gmail.com</Username>
                        <MobileProvider xsi:nil="true" />
                        <AppointmentGenderPreference>None</AppointmentGenderPreference>
                        <Gender>Female</Gender>
                        <IsCompany>false</IsCompany>
                        <LiabilityRelease>false</LiabilityRelease>
                        <EmergencyContactInfoName>K</EmergencyContactInfoName>
                        <EmergencyContactInfoRelationship></EmergencyContactInfoRelationship>
                        <EmergencyContactInfoPhone>321312321</EmergencyContactInfoPhone>
                        <PromotionalEmailOptIn>false</PromotionalEmailOptIn>
                        <CreationDate>2018-11-21T14:21:20.99</CreationDate>
                        <Liability>
                            <IsReleased>false</IsReleased>
                            <AgreementDate xsi:nil="true" />
                            <ReleasedBy xsi:nil="true" />
                        </Liability>
                        <UniqueID>100000000</UniqueID>
                        <ID>100000000</ID>
                        <FirstName>K</FirstName>
                        <LastName></LastName>
                        <Email>xxxx@gmail.com</Email>
                        <EmailOptIn>false</EmailOptIn>
                        <AddressLine1>AddressLine1</AddressLine1>
                        <AddressLine2 />
                        <City>Dubai</City>
                        <State>DU</State>
                        <PostalCode>0000</PostalCode>
                        <Country>AE</Country>
                        <MobilePhone>01323213</MobilePhone>
                        <HomePhone>0312312321</HomePhone>
                        <WorkPhone>05321312312</WorkPhone>
                        <BirthDate>1995-03-12T00:00:00</BirthDate>
                        <FirstAppointmentDate xsi:nil="true" />
                        <ReferredBy>Internet</ReferredBy>
                        <IsProspect>false</IsProspect>
                        <LastModifiedDateTime>2019-11-21T08:23:07.5Z</LastModifiedDateTime>
                        <Status>Non-Member</Status>
                        <ContactMethod>1</ContactMethod>
                    </Client>
                </Clients>
            </GetClientsResult>
        </GetClientsResponse>
    </soap:Body>
</soap:Envelope>';
    }
}
