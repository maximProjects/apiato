<?php

/**
 * @apiGroup           Project
 * @apiName            cloneProjectById
 *
 * @api                {GET} /vv1/projects/clone/:id Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         v1.0.0
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
$router->post('projects/clone', [
    'as' => 'api_project_clone_project_by_id',
    'uses'  => 'Controller@cloneProjectById',
    'middleware' => [
      'auth:api',
    ],
]);
