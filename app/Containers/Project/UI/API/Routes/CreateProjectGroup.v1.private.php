<?php

/**
 * @apiGroup           Project
 * @apiName            CreateProjectGroup
 *
 * @api                {POST} /v1/project-groups Endpoint title here..
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
$router->post('project-groups', [
    'as' => 'api_project_create_project_group',
    'uses'  => 'Controller@createProjectGroup',
    'middleware' => [
      'auth:api',
    ],
]);
