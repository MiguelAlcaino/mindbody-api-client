<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model\MindbodyClass;

class GETClassesResponse extends RESTResponse
{
    /**
     * @var MindbodyClass[]
     * @Serializer\SerializedName("Classes")
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model\MindbodyClass>")
     */
    private array $classes;

    public function __construct(array $classes)
    {
        $this->classes = $classes;
    }

    public function getClasses(): array
    {
        return $this->classes;
    }
}
