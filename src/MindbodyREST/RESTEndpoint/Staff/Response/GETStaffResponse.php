<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Staff\Response;

use JMS\Serializer\Annotation as Serializer;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Staff\Model\StaffMember;

class GETStaffResponse extends RESTResponse
{
    /**
     * @var StaffMember[]
     * @Serializer\SerializedName("StaffMembers")
     * @Serializer\Type("array<MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Staff\Model\StaffMember>")
     */
    public readonly array $staffMembers;
}
