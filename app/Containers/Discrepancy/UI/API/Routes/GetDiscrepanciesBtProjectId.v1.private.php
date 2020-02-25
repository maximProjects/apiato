<?php

/**
 * @apiGroup           Discrepancy
 * @apiName            getDiscrepancyByProjectId
 *
 * @api                {GET} /v1/projects/:id/discrepancies Endpoint title here..
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
$router->get('projects/{id}/discrepancies', [
    'as' => 'api_discrepancy_get_discrepancy_by_project_id',
    'uses'  => 'Controller@getDiscrepancyByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
