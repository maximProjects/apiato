<?php

/**
 * @apiGroup           Project
 * @apiName            getProjectGroupsByProjectId
 *
 * @api                {GET} /v1/projects/:project_id/project-groups Endpoint title here..
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
$router->get('projects/{id}/project-groups', [
    'as' => 'api_project_get_project_groups_by_project_id',
    'uses'  => 'Controller@getProjectGroupsByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
