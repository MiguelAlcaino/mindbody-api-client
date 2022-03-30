<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model;

use JMS\Serializer\Annotation as Serializer;

class ClassDescription
{
    /**
     * @Serializer\SerializedName("SessionType")
     */
    private SessionType $sessionType;

    public function __construct(SessionType $sessionType)
    {
        $this->sessionType = $sessionType;
    }

    public function getSessionType(): SessionType
    {
        return $this->sessionType;
    }
}
