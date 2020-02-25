<?php

/**
 * @apiGroup           Timer
 * @apiName            updateTimer
 *
 * @api                {PATCH} /v1/timers/:id Endpoint title here..
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
$router->patch('timers/{id}', [
    'as' => 'api_timer_update_timer',
    'uses'  => 'Controller@updateTimer',
    'middleware' => [
      'auth:api',
    ],
]);
