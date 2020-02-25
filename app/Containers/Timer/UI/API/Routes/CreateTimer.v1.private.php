<?php

/**
 * @apiGroup           Timer
 * @apiName            createTimer
 *
 * @api                {POST} /v1/timers Endpoint title here..
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
$router->post('timers', [
    'as' => 'api_timer_create_timer',
    'uses'  => 'Controller@createTimer',
    'middleware' => [
      'auth:api',
    ],
]);
