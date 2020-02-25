<?php

/**
 * @apiGroup           Schedule
 * @apiName            deleteSchedule
 *
 * @api                {DELETE} /v1/shedules/:id Endpoint title here..
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
$router->delete('shedules/{id}', [
    'as' => 'api_schedule_delete_schedule',
    'uses'  => 'Controller@deleteSchedule',
    'middleware' => [
      'auth:api',
    ],
]);
