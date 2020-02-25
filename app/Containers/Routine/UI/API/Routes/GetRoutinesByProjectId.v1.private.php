<?php

/**
 * @apiGroup           Routine
 * @apiName            getRoutinesByProjectId
 *
 * @api                {GET} /v1/projects/:id/routines Endpoint title here..
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
$router->get('projects/{id}/routines', [
    'as' => 'api_routine_get_routines_by_project_id',
    'uses'  => 'Controller@getRoutinesByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
