<?php

/**
 * @apiGroup           TimeRegistry
 * @apiName            deleteTimeRegistry
 *
 * @api                {DELETE} /v1/time_registry/:id Endpoint title here..
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
$router->delete('time-registry/{id}', [
    'as' => 'api_timeregistry_delete_time_registry',
    'uses'  => 'Controller@deleteTimeRegistry',
    'middleware' => [
      'auth:api',
    ],
]);
