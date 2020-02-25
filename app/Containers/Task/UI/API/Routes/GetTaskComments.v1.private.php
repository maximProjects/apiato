<?php

/**
 * @apiGroup           Task
 * @apiName            getTaskComments
 *
 * @api                {GET} /v1/tasks/:id/comments Endpoint title here..
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
$router->get('tasks/{id}/comments', [
    'as' => 'api_task_get_task_comments',
    'uses'  => 'Controller@getTaskComments',
    'middleware' => [
      'auth:api',
    ],
]);
