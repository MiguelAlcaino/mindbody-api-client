<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Client\Model;

enum VisitUpdateExecuteEnum: string
{
    case CANCEL = 'cancel';
    case LATECANCEL = 'latecancel';
    case UNLATECANCEL = 'unlatecancel';
}
