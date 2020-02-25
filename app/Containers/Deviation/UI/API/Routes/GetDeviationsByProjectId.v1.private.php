<?php

/**
 * @apiGroup           Deviation
 * @apiName            getDeviationsByProjectId
 *
 * @api                {GET} /v1/projects/:id/deviations Endpoint title here..
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
$router->get('projects/{id}/deviations', [
    'as' => 'api_deviation_get_deviations_by_project_id',
    'uses'  => 'Controller@getDeviationsByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
