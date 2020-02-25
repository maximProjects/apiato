<?php

/**
 * @apiGroup           TimeRegistry
 * @apiName            createTimeRegistry
 *
 * @api                {POST} /v1/time_registry Endpoint title here..
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
$router->post('time-registry', [
    'as' => 'api_timeregistry_create_time_registry',
    'uses'  => 'Controller@createTimeRegistry',
    'middleware' => [
      'auth:api',
    ],
]);
