<?php

declare(strict_types=1);

namespace MiguelAlcainoTest\MindbodyApiClient\Test\Unit\MindbodyREST\RESTEndpoint\MindbodyClass\Response;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response\GETClassVisitsResponse;
use PHPUnit\Framework\TestCase;

/**
 * Mindbody omits optional keys instead of sending them as null. When a booking has no
 * pricing option behind it (typically a waitlist auto-promotion or a comp booking) the
 * ClassVisits payload comes back without ProductId/ServiceId/ServiceName/SignedIn, and
 * previously the typed properties stayed uninitialized so every getter threw an Error.
 */
class GETClassVisitsResponseDeserializationTest extends TestCase
{
    private SerializerInterface $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = SerializerBuilder::create()->build();
    }

    public function testDeserializesVisitWithoutOptionalKeys(): void
    {
        /** @var GETClassVisitsResponse $response */
        $response = $this->serializer->deserialize(
            $this->getClassVisitsPayloadWithoutOptionalVisitKeys(),
            GETClassVisitsResponse::class,
            'json',
        );

        $visits = $response->getClass()->getVisits();

        $this->assertNotNull($visits);
        $this->assertCount(1, $visits);

        $visit = $visits[0];

        $this->assertSame(1128912, $visit->getId());
        $this->assertNull($visit->getProductId());
        $this->assertNull($visit->getServiceId());
        $this->assertNull($visit->getServiceName());
        $this->assertNull($visit->getSignedIn());
        $this->assertNull($visit->getLastModifiedDateTime());
        $this->assertNull($visit->getWaitlistEntryId());
    }

    public function testDeserializesVisitWithOptionalKeysPresent(): void
    {
        /** @var GETClassVisitsResponse $response */
        $response = $this->serializer->deserialize(
            $this->getClassVisitsPayload(),
            GETClassVisitsResponse::class,
            'json',
        );

        $visits = $response->getClass()->getVisits();

        $this->assertNotNull($visits);
        $visit = $visits[0];

        $this->assertSame(103265, $visit->getProductId());
        $this->assertSame(90, $visit->getServiceId());
        $this->assertSame('40 sessions', $visit->getServiceName());
        $this->assertFalse($visit->getSignedIn());
        $this->assertSame(
            '2026-07-24 19:34:00',
            $visit->getLastModifiedDateTime()?->format('Y-m-d H:i:s'),
        );
    }

    public function testDeserializesClassWithoutOptionalKeys(): void
    {
        /** @var GETClassVisitsResponse $response */
        $response = $this->serializer->deserialize(
            $this->getClassPayloadWithoutOptionalKeys(),
            GETClassVisitsResponse::class,
            'json',
        );

        $mindbodyClass = $response->getClass();

        $this->assertSame(95877, $mindbodyClass->getId());
        $this->assertNull($mindbodyClass->getMaxCapacity());
        $this->assertNull($mindbodyClass->getWebCapacity());
        $this->assertNull($mindbodyClass->getTotalBooked());
        $this->assertNull($mindbodyClass->getVisits());
        $this->assertNull($mindbodyClass->getBookingWindow());
        $this->assertNull($mindbodyClass->getWaitlistSize());
        $this->assertNull($mindbodyClass->getClassDescription()->getCategory());
    }

    private function getClassVisitsPayloadWithoutOptionalVisitKeys(): string
    {
        return $this->wrapVisits(
            <<<'JSON'
                {
                    "Id": 1128912,
                    "ClassId": 95877,
                    "ClientId": "100000003",
                    "StartDateTime": "2026-07-25T10:00:00",
                    "EndDateTime": "2026-07-25T10:45:00",
                    "Name": "SHAPE",
                    "LateCancelled": false
                }
                JSON,
        );
    }

    private function getClassVisitsPayload(): string
    {
        return $this->wrapVisits(
            <<<'JSON'
                {
                    "Id": 1128912,
                    "ClassId": 95877,
                    "ClientId": "100000003",
                    "StartDateTime": "2026-07-25T10:00:00",
                    "EndDateTime": "2026-07-25T10:45:00",
                    "Name": "SHAPE",
                    "LastModifiedDateTime": "2026-07-24T19:34:00.4Z",
                    "LateCancelled": false,
                    "ServiceId": 90,
                    "ServiceName": "40 sessions",
                    "ProductId": 103265,
                    "SignedIn": false,
                    "WaitlistEntryId": null
                }
                JSON,
        );
    }

    private function wrapVisits(string $visitJson): string
    {
        return <<<JSON
            {
                "Class": {
                    "Id": 95877,
                    "ClassScheduleId": 4321,
                    "StartDateTime": "2026-07-25T10:00:00",
                    "EndDateTime": "2026-07-25T10:45:00",
                    "IsWaitlistAvailable": true,
                    "MaxCapacity": 12,
                    "WebCapacity": 12,
                    "TotalBooked": 12,
                    "ClassDescription": {
                        "Id": 55,
                        "Name": "SHAPE",
                        "SessionType": {
                            "Id": 7,
                            "Name": "SHAPE"
                        }
                    },
                    "Visits": [{$visitJson}]
                }
            }
            JSON;
    }

    private function getClassPayloadWithoutOptionalKeys(): string
    {
        return <<<'JSON'
            {
                "Class": {
                    "Id": 95877,
                    "ClassScheduleId": 4321,
                    "StartDateTime": "2026-07-25T10:00:00",
                    "EndDateTime": "2026-07-25T10:45:00",
                    "IsWaitlistAvailable": true,
                    "ClassDescription": {
                        "Id": 55,
                        "Name": "SHAPE",
                        "SessionType": {
                            "Id": 7,
                            "Name": "SHAPE"
                        }
                    }
                }
            }
            JSON;
    }
}
