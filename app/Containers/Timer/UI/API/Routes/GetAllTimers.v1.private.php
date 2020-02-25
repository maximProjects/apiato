<?php

/**
 * @apiGroup           Timer
 * @apiName            getAllTimers
 *
 * @api                {GET} /v1/timers Endpoint title here..
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
$router->get('timers', [
    'as' => 'api_timer_get_all_timers',
    'uses'  => 'Controller@getAllTimers',
    'middleware' => [
      'auth:api',
    ],
]);
