<?php

/**
 * @apiGroup           WorkIncapacity
 * @apiName            getWorkIncapacitiesByProjectId
 *
 * @api                {GET} /v1/projects/:id/workincapatities Endpoint title here..
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
$router->get('projects/{id}/work-incapatities', [
    'as' => 'api_workincapacity_get_work_incapacities_by_project_id',
    'uses'  => 'Controller@getWorkIncapacitiesByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
