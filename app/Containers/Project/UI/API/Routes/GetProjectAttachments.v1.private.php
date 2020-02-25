<?php

/**
 * @apiGroup           Project
 * @apiName            getProjectAttachments
 *
 * @api                {GET} /v1/projects/:id/attachments Endpoint title here..
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
$router->get('projects/{id}/attachments', [
    'as' => 'api_project_get_project_attachments',
    'uses'  => 'Controller@getProjectAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
