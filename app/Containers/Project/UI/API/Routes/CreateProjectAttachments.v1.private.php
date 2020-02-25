<?php

/**
 * @apiGroup           Project
 * @apiName            createProjectAttachments
 *
 * @api                {POST} /v1/projects/:1/attachments Endpoint title here..
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
$router->post('projects/{id}/attachments', [
    'as' => 'api_project_create_project_attachments',
    'uses'  => 'Controller@createProjectAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
