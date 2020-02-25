<?php

/**
 * @apiGroup           ResourcePlan
 * @apiName            getAllResourcePlans
 *
 * @api                {GET} /v1/resource-plan Endpoint title here..
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
$router->get('resource-plan', [
    'as' => 'api_resourceplan_get_all_resource_plans',
    'uses'  => 'Controller@getAllResourcePlans',
    'middleware' => [
      'auth:api',
    ],
]);
