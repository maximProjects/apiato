<?php

/**
 * @apiGroup           TimeRegistry
 * @apiName            startTimeRegistry
 *
 * @api                {POST} /v1/time-registry/start Endpoint title here..
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
$router->post('time-registry/start', [
    'as' => 'api_timeregistry_start_time_registry',
    'uses'  => 'Controller@startTimeRegistry',
    'middleware' => [
      'auth:api',
    ],
]);
