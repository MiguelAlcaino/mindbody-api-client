<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\PaginatedResponseInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\PaginatedResponseTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model\MindbodyClass;

class GETClassesResponse extends RESTResponse implements PaginatedResponseInterface
{
    use PaginatedResponseTrait;

    /**
     * @var MindbodyClass[]
     */
    #[Serializer\SerializedName("Classes")]
    #[Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model\MindbodyClass>")]
    private array $classes;

    /**
     * @param array<MindbodyClass> $classes
     */
    public function __construct(array $classes)
    {
        $this->classes = $classes;
    }

    /**
     * @return MindbodyClass[]
     */
    public function getClasses(): array
    {
        return $this->classes;
    }
}
