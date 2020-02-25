<?php

/**
 * @apiGroup           Task
 * @apiName            getTaskAttachments
 *
 * @api                {GET} /v1/tasks/:id/attachments Endpoint title here..
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
$router->get('tasks/{id}/attachments', [
    'as' => 'api_task_get_task_attachments',
    'uses'  => 'Controller@getTaskAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
