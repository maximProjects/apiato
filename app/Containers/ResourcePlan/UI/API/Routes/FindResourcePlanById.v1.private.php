<?php

/**
 * @apiGroup           ResourcePlan
 * @apiName            findResourcePlanById
 *
 * @api                {GET} /v1/resource-plan/:id Endpoint title here..
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
$router->get('resource-plan/{id}', [
    'as' => 'api_resourceplan_find_resource_plan_by_id',
    'uses'  => 'Controller@findResourcePlanById',
    'middleware' => [
      'auth:api',
    ],
]);
