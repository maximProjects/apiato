<?php

/**
 * @apiGroup           ResourcePlan
 * @apiName            getResourcePlanByProjectId
 *
 * @api                {GET} /v1/resource-plan/project Endpoint title here..
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
$router->get('projects/{id}/resource-plan', [
    'as' => 'api_resourceplan_get_resource_plan_by_project_id',
    'uses'  => 'Controller@getResourcePlanByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
