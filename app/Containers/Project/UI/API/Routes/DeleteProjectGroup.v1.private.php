<?php

/**
 * @apiGroup           Project
 * @apiName            DeleteProjectGroup
 *
 * @api                {DELETE} /v1/project-groups/:id Endpoint title here..
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
$router->delete('project-groups/{id}', [
    'as' => 'api_project_delete_project_group',
    'uses'  => 'Controller@deleteProjectGroup',
    'middleware' => [
      'auth:api',
    ],
]);
