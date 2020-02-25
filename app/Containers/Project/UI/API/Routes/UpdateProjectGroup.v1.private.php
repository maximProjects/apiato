<?php

/**
 * @apiGroup           Project
 * @apiName            updateProjectGroup
 *
 * @api                {PATCH} /v1/progect-groups/:id Endpoint title here..
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
$router->patch('project-groups/{id}', [
    'as' => 'api_project_update_project_group',
    'uses'  => 'Controller@updateProjectGroup',
    'middleware' => [
      'auth:api',
    ],
]);
