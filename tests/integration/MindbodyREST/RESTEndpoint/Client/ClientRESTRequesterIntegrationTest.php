<?php

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Integration\MindbodyREST\RESTEndpoint\Client;

use DateTimeImmutable;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\MindbodyRESTRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\RESTRequesterExecutor;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\ClientRESTRequester;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Request\GETClientVisitsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\Serializer\Factory\JmsSerializerFactory;
use PHPUnit\Framework\TestCase;

class ClientRESTRequesterIntegrationTest extends TestCase
{
    public function testGetClientVisitsWithMockedResponse(): void
    {
        $mock = new MockHandler(
            [
                new Response(200, [], $this->getClientVisitsResponseBody()),
            ],
        );

        $handlerStack = HandlerStack::create($mock);
        $guzzleClient = new Client(['handler' => $handlerStack]);

        $clientRequester = $this->getClientRequester($guzzleClient);

        $request = new GETClientVisitsRequest('100002328', new DateTimeImmutable('2018-01-01'));
        $request->setUserStaffToken('FAKE_TOKEN');
        $request->setSiteId(564676);

        $response = $clientRequester->getClientVisits($request);

        // Test pagination response
        $paginationResponse = $response->getPaginationResponse();
        self::assertNotNull($paginationResponse);
        self::assertEquals(2, $paginationResponse->getRequestedLimit());
        self::assertEquals(0, $paginationResponse->getRequestedOffset());
        self::assertEquals(2, $paginationResponse->getPageSize());
        self::assertEquals(564, $paginationResponse->getTotalResults());

        // Test visits array
        $visits = $response->getVisits();
        self::assertCount(2, $visits);

        // Test first visit
        $firstVisit = $visits[0];
        self::assertEquals(25538, $firstVisit->getId());
        self::assertEquals(0, $firstVisit->getAppointmentId());
        self::assertEquals('None', $firstVisit->getAppointmentGenderPreference());
        self::assertEquals('NoShow', $firstVisit->getAppointmentStatus());
        self::assertEquals(1949, $firstVisit->getClassId());
        self::assertEquals('100002328', $firstVisit->getClientId());
        self::assertNull($firstVisit->getClientPhotoUrl());
        self::assertEquals(100002328, $firstVisit->getClientUniqueId());
        self::assertEquals('2018-11-01T07:00:00', $firstVisit->getStartDateTime()->format('Y-m-d\TH:i:s'));
        self::assertEquals('2018-11-01T07:45:00', $firstVisit->getEndDateTime()->format('Y-m-d\TH:i:s'));
        self::assertEquals('2018-11-01T02:58:27', $firstVisit->getLastModifiedDateTime()->format('Y-m-d\TH:i:s'));
        self::assertFalse($firstVisit->getLateCancelled());
        self::assertEquals(564676, $firstVisit->getSiteId());
        self::assertEquals(1, $firstVisit->getLocationId());
        self::assertFalse($firstVisit->getMakeUp());
        self::assertEquals('Ride', $firstVisit->getName());
        self::assertEquals(34360, $firstVisit->getServiceId());
        self::assertEquals('ClassPass', $firstVisit->getServiceName());
        self::assertEquals(101130, $firstVisit->getProductId());
        self::assertTrue($firstVisit->getSignedIn());
        self::assertEquals(100000016, $firstVisit->getStaffId());
        self::assertFalse($firstVisit->getWebSignup());
        self::assertEquals('None', $firstVisit->getAction());
        self::assertFalse($firstVisit->getMissed());
        self::assertEquals(5, $firstVisit->getVisitType());
        self::assertEquals(22, $firstVisit->getTypeGroup());
        self::assertEquals('ClassPass', $firstVisit->getTypeTaken());

        // Test nested Service object
        $service = $firstVisit->getService();
        self::assertNotNull($service);
        self::assertEquals(34360, $service->getId());
        self::assertEquals(101130, $service->getProductId());
        self::assertEquals('ClassPass', $service->getName());
        self::assertEquals('2018-10-31T00:00:00', $service->getActiveDate()->format('Y-m-d\TH:i:s'));
        self::assertEquals('2018-11-09T00:00:00', $service->getExpirationDate()->format('Y-m-d\TH:i:s'));
        self::assertEquals('2018-10-31T00:00:00', $service->getPaymentDate()->format('Y-m-d\TH:i:s'));
        self::assertEquals(1, $service->getCount());
        self::assertFalse($service->isCurrent());
        self::assertEquals(0, $service->getRemaining());
        self::assertEquals(564676, $service->getSiteId());
        self::assertEquals('None', $service->getAction());
        self::assertEquals('100002328', $service->getClientId());
        self::assertFalse($service->isReturned());

        // Test nested Program object
        $program = $service->getProgram();
        self::assertNotNull($program);
        self::assertEquals(22, $program->getId());
        self::assertEquals('Pricing - all', $program->getName());
        self::assertEquals('Class', $program->getScheduleType());
        self::assertEquals(720, $program->getCancelOffset());
        self::assertEquals(['InPerson'], $program->getContentFormats());
        self::assertEquals(0, $program->getScheduleOffset());
        self::assertEquals(10, $program->getScheduleOffsetEnd());

        // Test nested PricingRelationships object
        $pricingRelationships = $program->getPricingRelationships();
        self::assertNotNull($pricingRelationships);
        self::assertEquals([23, 24, 27, 30], $pricingRelationships->getPaysFor());
        self::assertEquals([30], $pricingRelationships->getPaidBy());

        // Test second visit
        $secondVisit = $visits[1];
        self::assertEquals(25689, $secondVisit->getId());
        self::assertEquals(11254, $secondVisit->getClassId());
        self::assertEquals('2018-11-02T08:30:00', $secondVisit->getStartDateTime()->format('Y-m-d\TH:i:s'));
        self::assertEquals('2018-11-02T09:15:00', $secondVisit->getEndDateTime()->format('Y-m-d\TH:i:s'));
        self::assertEquals(100000019, $secondVisit->getStaffId());
    }

    private function getClientRequester(Client $guzzleClient): ClientRESTRequester
    {
        $serializerFactory = new JmsSerializerFactory();
        $serializer = $serializerFactory->create();

        $restRequester = new MindbodyRESTRequester(
            'FAKE_API_KEY',
            $guzzleClient,
        );

        $restRequesterExecutor = new RESTRequesterExecutor($restRequester, $serializer);

        return new ClientRESTRequester($restRequesterExecutor);
    }

    private function getClientVisitsResponseBody(): string
    {
        return <<<'JSON'
{
    "PaginationResponse": {
        "RequestedLimit": 2,
        "RequestedOffset": 0,
        "PageSize": 2,
        "TotalResults": 564
    },
    "Visits": [
        {
            "AppointmentId": 0,
            "AppointmentGenderPreference": "None",
            "AppointmentStatus": "NoShow",
            "ClassId": 1949,
            "ClientId": "100002328",
            "ClientPhotoUrl": null,
            "ClientUniqueId": 100002328,
            "StartDateTime": "2018-11-01T07:00:00",
            "EndDateTime": "2018-11-01T07:45:00",
            "Id": 25538,
            "LastModifiedDateTime": "2018-11-01T02:58:27.4Z",
            "LateCancelled": false,
            "SiteId": 564676,
            "LocationId": 1,
            "MakeUp": false,
            "Name": "Ride",
            "ServiceId": 34360,
            "ServiceName": "ClassPass",
            "Service": {
                "ActiveDate": "2018-10-31T00:00:00",
                "Count": 1,
                "Current": false,
                "ExpirationDate": "2018-11-09T00:00:00",
                "Id": 34360,
                "ProductId": 101130,
                "Name": "ClassPass",
                "PaymentDate": "2018-10-31T00:00:00",
                "Program": {
                    "Id": 22,
                    "Name": "Pricing - all",
                    "ScheduleType": "Class",
                    "CancelOffset": 720,
                    "ContentFormats": [
                        "InPerson"
                    ],
                    "ScheduleOffset": 0,
                    "ScheduleOffsetEnd": 10,
                    "PricingRelationships": {
                        "PaysFor": [
                            23,
                            24,
                            27,
                            30
                        ],
                        "PaidBy": [
                            30
                        ]
                    }
                },
                "Remaining": 0,
                "SiteId": 564676,
                "Action": "None",
                "ClientID": "100002328",
                "Returned": false
            },
            "ProductId": 101130,
            "SignedIn": true,
            "StaffId": 100000016,
            "WebSignup": false,
            "Action": "None",
            "Missed": false,
            "VisitType": 5,
            "TypeGroup": 22,
            "TypeTaken": "ClassPass"
        },
        {
            "AppointmentId": 0,
            "AppointmentGenderPreference": "None",
            "AppointmentStatus": "NoShow",
            "ClassId": 11254,
            "ClientId": "100002328",
            "ClientPhotoUrl": null,
            "ClientUniqueId": 100002328,
            "StartDateTime": "2018-11-02T08:30:00",
            "EndDateTime": "2018-11-02T09:15:00",
            "Id": 25689,
            "LastModifiedDateTime": "2018-11-02T04:30:14.9Z",
            "LateCancelled": false,
            "SiteId": 564676,
            "LocationId": 1,
            "MakeUp": false,
            "Name": "Ride",
            "ServiceId": 34499,
            "ServiceName": "ClassPass",
            "Service": {
                "ActiveDate": "2018-11-01T00:00:00",
                "Count": 1,
                "Current": false,
                "ExpirationDate": "2018-11-10T00:00:00",
                "Id": 34499,
                "ProductId": 101130,
                "Name": "ClassPass",
                "PaymentDate": "2018-11-01T00:00:00",
                "Program": {
                    "Id": 22,
                    "Name": "Pricing - all",
                    "ScheduleType": "Class",
                    "CancelOffset": 720,
                    "ContentFormats": [
                        "InPerson"
                    ],
                    "ScheduleOffset": 0,
                    "ScheduleOffsetEnd": 10,
                    "PricingRelationships": {
                        "PaysFor": [
                            23,
                            24,
                            27,
                            30
                        ],
                        "PaidBy": [
                            30
                        ]
                    }
                },
                "Remaining": 0,
                "SiteId": 564676,
                "Action": "None",
                "ClientID": "100002328",
                "Returned": false
            },
            "ProductId": 101130,
            "SignedIn": true,
            "StaffId": 100000019,
            "WebSignup": false,
            "Action": "None",
            "Missed": false,
            "VisitType": 5,
            "TypeGroup": 22,
            "TypeTaken": "ClassPass"
        }
    ]
}
JSON;
    }
}
