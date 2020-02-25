<?php

/**
 * @apiGroup           Schedule
 * @apiName            createProjectSchedules
 *
 * @api                {POST} /v1/schedules-projects Endpoint title here..
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
$router->post('schedules-project', [
    'as' => 'api_schedule_create_project_schedules',
    'uses'  => 'Controller@createProjectSchedules',
    'middleware' => [
      'auth:api',
    ],
]);
