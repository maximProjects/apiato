<?php

/**
 * @apiGroup           TimeRegistry
 * @apiName            createTimeRegistryComments
 *
 * @api                {POST} /v1/time-registry/:id/comments Endpoint title here..
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
$router->post('time-registry/{id}/comments', [
    'as' => 'api_timeregistry_create_time_registry_comments',
    'uses'  => 'Controller@createTimeRegistryComments',
    'middleware' => [
      'auth:api',
    ],
]);
