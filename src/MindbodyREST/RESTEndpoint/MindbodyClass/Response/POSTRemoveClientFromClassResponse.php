<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model\MindbodyClass;

class POSTRemoveClientFromClassResponse extends RESTResponse
{
    public function __construct(
        #[Serializer\SerializedName("Class")]
        private readonly MindbodyClass $class
    ) {
    }

    public function getClass(): MindbodyClass
    {
        return $this->class;
    }
}
