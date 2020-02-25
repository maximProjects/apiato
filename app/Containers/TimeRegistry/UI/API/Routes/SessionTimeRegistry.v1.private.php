<?php

/**
 * @apiGroup           TimeRegistry
 * @apiName            sessionTimeRegistry
 *
 * @api                {GET} /v1/time-registry/session Endpoint title here..
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
$router->get('time-registry-session', [
    'as' => 'api_timeregistry_session_time_registry',
    'uses'  => 'Controller@sessionTimeRegistry',
    'middleware' => [
      'auth:api',
    ],
]);
