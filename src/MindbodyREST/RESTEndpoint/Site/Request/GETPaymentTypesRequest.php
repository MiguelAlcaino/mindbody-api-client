<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Site\Request;

use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\Common\Model\RESTRequest;

class GETPaymentTypesRequest extends RESTRequest
{
    public function getMethod(): string
    {
        return 'GET';
    }

    public function getPath(): string
    {
        return 'site/paymenttypes';
    }
}
