<?php

/**
 * @apiGroup           Schedule
 * @apiName            findScheduleById
 *
 * @api                {GET} /v1/shedules/:id Endpoint title here..
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
$router->get('shedules/{id}', [
    'as' => 'api_schedule_find_schedule_by_id',
    'uses'  => 'Controller@findScheduleById',
    'middleware' => [
      'auth:api',
    ],
]);
