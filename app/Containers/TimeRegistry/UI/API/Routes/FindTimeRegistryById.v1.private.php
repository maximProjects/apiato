<?php

/**
 * @apiGroup           TimeRegistry
 * @apiName            findTimeRegistryById
 *
 * @api                {GET} /v1/time_registry/:id Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->get('time-registry/{id}', [
    'as' => 'api_timeregistry_find_time_registry_by_id',
    'uses'  => 'Controller@findTimeRegistryById',
    'middleware' => [
      'auth:api',
    ],
]);
