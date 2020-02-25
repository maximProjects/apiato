<?php

/**
 * @apiGroup           Task
 * @apiName            createTaskComments
 *
 * @api                {POST} /v1/tasks/comments Endpoint title here..
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
$router->post('tasksXXX/{id}/comments', [
    'as' => 'api_task_create_task_comments',
    'uses'  => 'Controller@createTaskComments',
    'middleware' => [
      'auth:api',
    ],
]);
