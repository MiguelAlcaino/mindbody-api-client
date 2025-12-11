<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model\Response;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

class Visit
{
    #[Serializer\SerializedName('ID')]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('string')]
    private $id;

    #[Serializer\SerializedName('ClassID')]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('string')]
    private string $classId;

    #[Serializer\SerializedName('AppointmentID')]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('string')]
    private $appointmentId;

    #[Serializer\SerializedName('StartDateTime')]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")]
    private ?DateTimeImmutable $startDateTime;

    #[Serializer\SerializedName('LateCancelled')]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('bool')]
    private $lateCancelled;

    #[Serializer\SerializedName('EndDateTime')]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")]
    private ?DateTimeImmutable $endDateTime;

    #[Serializer\SerializedName('Name')]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('string')]
    private $name;

    #[Serializer\SerializedName('WebSignup')]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('bool')]
    private ?bool $webSignup;

    #[Serializer\SerializedName('SignedIn')]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('bool')]
    private $signedIn;

    #[Serializer\SerializedName('MakeUp')]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\Type('bool')]
    private ?bool $makeUp;

    public function getId(): string
    {
        return $this->id;
    }

    public function getClassId(): string
    {
        return $this->classId;
    }

    public function getAppointmentId(): string
    {
        return $this->appointmentId;
    }

    public function getStartDateTime(): ?DateTimeImmutable
    {
        return $this->startDateTime;
    }

    public function getLateCancelled(): ?bool
    {
        return $this->lateCancelled;
    }

    public function getEndDateTime(): ?DateTimeImmutable
    {
        return $this->endDateTime;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getWebSignup(): ?bool
    {
        return $this->webSignup;
    }

    public function getSignedIn(): ?bool
    {
        return $this->signedIn;
    }

    public function getMakeUp(): ?bool
    {
        return $this->makeUp;
    }
}
