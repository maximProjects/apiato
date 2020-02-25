<?php

/**
 * @apiGroup           Task
 * @apiName            getTasksByProjectId
 *
 * @api                {GET} /v1/tasks/:project_id/tasks Endpoint title here..
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
$router->get('projects/{id}/tasks', [
    'as' => 'api_task_get_tasks_by_project_id',
    'uses'  => 'Controller@getTasksByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
