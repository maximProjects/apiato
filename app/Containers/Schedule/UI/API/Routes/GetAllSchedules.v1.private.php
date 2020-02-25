<?php

/**
 * @apiGroup           Schedule
 * @apiName            getAllSchedules
 *
 * @api                {GET} /v1/shedules Endpoint title here..
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
$router->get('schedules', [
    'as' => 'api_schedule_get_all_schedule',
    'uses'  => 'Controller@getAllSchedules',
    'middleware' => [
      'auth:api',
    ],
]);
