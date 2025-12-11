<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClassService\Model;

use JsonSerializable;

class GetClassDescriptionsRequest implements JsonSerializable
{
    public function jsonSerialize(): array
    {
        return [];
    }
}
