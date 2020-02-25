<?php

/**
 * @apiGroup           Timer
 * @apiName            pauseTimer
 *
 * @api                {POST} /v1/timers/pause Endpoint title here..
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
$router->post('timers/pause', [
    'as' => 'api_timer_pause_timer',
    'uses'  => 'Controller@pauseTimer',
    'middleware' => [
      'auth:api',
    ],
]);
