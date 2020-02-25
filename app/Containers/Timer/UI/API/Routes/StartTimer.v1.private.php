<?php

/**
 * @apiGroup           Timer
 * @apiName            startTimer
 *
 * @api                {POST} /v1/timers/start Endpoint title here..
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
$router->post('timers/start', [
    'as' => 'api_timer_start_timer',
    'uses'  => 'Controller@startTimer',
    'middleware' => [
      'auth:api',
    ],
]);
