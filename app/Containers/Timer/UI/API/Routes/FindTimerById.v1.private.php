<?php

/**
 * @apiGroup           Timer
 * @apiName            findTimerById
 *
 * @api                {GET} /v1/timers/:id Endpoint title here..
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
$router->get('timers/{id}', [
    'as' => 'api_timer_find_timer_by_id',
    'uses'  => 'Controller@findTimerById',
    'middleware' => [
      'auth:api',
    ],
]);
