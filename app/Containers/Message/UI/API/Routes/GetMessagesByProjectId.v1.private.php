<?php

/**
 * @apiGroup           Message
 * @apiName            getMessagesByProjectId
 *
 * @api                {PROJECTS/{ID}/MESSAGES} /v1/projects/:id/messages Endpoint title here..
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
$router->get('projects/{id}/messages', [
    'as' => 'api_message_get_messages_by_project_id',
    'uses'  => 'Controller@getMessagesByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
