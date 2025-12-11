<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass;

use MiguelAlcaino\MindbodyApiClient\MindbodyREST\BaseRequester\RESTRequesterExecutor;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request\GETClassDescriptionsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request\GETClassesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request\GETClassSchedulesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request\GETClassVisitsRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request\GETClassWaitlistEntriesRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request\POSTAddClientToClassRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request\POSTRemoveClientFromClassRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Request\POSTRemoveFromWaitlistRequest;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response\GETClassDescriptionsResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response\GETClassesResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response\GETClassSchedulesResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response\GETClassVisitsResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response\GETClassWaitlistEntriesResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response\POSTAddClientToClassResponse;
use MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Response\POSTRemoveClientFromClassResponse;

class ClassRESTRequester
{
    private RESTRequesterExecutor $restRequester;

    public function __construct(RESTRequesterExecutor $RESTRequester)
    {
        $this->restRequester = $RESTRequester;
    }

    /**
     * Note: This endpoint narrows down the selection of classes by the StartDateTime and EndDateTime. If none are
     * provided.
     */
    public function getClasses(GETClassesRequest $request): GETClassesResponse
    {
        return $this->restRequester->executeRequest($request, GETClassesResponse::class);
    }

    public function addClientToClass(POSTAddClientToClassRequest $request): POSTAddClientToClassResponse
    {
        return $this->restRequester->executeRequest($request, POSTAddClientToClassResponse::class);
    }

    public function getClassVisits(GETClassVisitsRequest $request): GETClassVisitsResponse
    {
        return $this->restRequester->executeRequest($request, GETClassVisitsResponse::class);
    }

    public function getClassWaitlistEntries(GETClassWaitlistEntriesRequest $request): GETClassWaitlistEntriesResponse
    {
        return $this->restRequester->executeRequest($request, GETClassWaitlistEntriesResponse::class);
    }

    public function getClassSchedules(GETClassSchedulesRequest $request): GETClassSchedulesResponse
    {
        return $this->restRequester->executeRequest($request, GETClassSchedulesResponse::class);
    }

    public function removeClientFromClass(POSTRemoveClientFromClassRequest $request): POSTRemoveClientFromClassResponse
    {
        return $this->restRequester->executeRequest($request, POSTRemoveClientFromClassResponse::class);
    }

    public function getClassDescriptions(GETClassDescriptionsRequest $request): GETClassDescriptionsResponse
    {
        return $this->restRequester->executeRequest($request, GETClassDescriptionsResponse::class);
    }

    /**
     * If this method succeeds, then null will be return. Otherwise, it throws an exception.
     * This is because th Mindbody endpoint does not return a response body.
     *
     * @see https://developers.mindbodyonline.com/PublicDocumentation/V6#remove-from-waitlist
     */
    public function removeClientFromWaitlist(POSTRemoveFromWaitlistRequest $request): null
    {
        // This endpoint does not return a body but only an empty response with 200. Anything different to a 200, means error.
        /* @phpstan-ignore-next-line Unable to resolve template type for null response class */
        return $this->restRequester->executeRequest($request, null);
    }
}
