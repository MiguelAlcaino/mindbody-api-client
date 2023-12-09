<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\PaginatedResponseInterface;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Util\PaginatedResponseTrait;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model\ClassDescription;

class GETClassDescriptionsResponse extends RESTResponse implements PaginatedResponseInterface
{
    use PaginatedResponseTrait;

    #[SerializedName('ClassDescriptions')]
    #[Type('array<' . ClassDescription::class . '>')]
    private array $classDescriptions;

    /**
     * @return array<int,ClassDescription>
     */
    public function getClassDescriptions(): array
    {
        return $this->classDescriptions;
    }
}
