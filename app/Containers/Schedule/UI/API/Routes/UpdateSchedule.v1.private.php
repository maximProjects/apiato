<?php

/**
 * @apiGroup           Schedule
 * @apiName            updateSchedule
 *
 * @api                {PATCH} /v1/shedules/:id Endpoint title here..
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
$router->patch('shedules/{id}', [
    'as' => 'api_schedule_update_schedule',
    'uses'  => 'Controller@updateSchedule',
    'middleware' => [
      'auth:api',
    ],
]);
