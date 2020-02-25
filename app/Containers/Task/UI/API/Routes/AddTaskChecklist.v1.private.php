<?php

/**
 * @apiGroup           Task
 * @apiName            addTaskChecklist
 *
 * @api                {POST} /v1/tasks/checklists Endpoint title here..
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
$router->post('tasks/checklists', [
    'as' => 'api_task_add_task_checklist',
    'uses'  => 'Controller@addTaskChecklist',
    'middleware' => [
      'auth:api',
    ],
]);
