<?php

/**
 * @apiGroup           Timer
 * @apiName            stopTimer
 *
 * @api                {POST} /v1/timers/stop Endpoint title here..
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
$router->post('timers/stop', [
    'as' => 'api_timer_stop_timer',
    'uses'  => 'Controller@stopTimer',
    'middleware' => [
      'auth:api',
    ],
]);
