<?php

/**
 * @apiGroup           ResourcePlan
 * @apiName            createResourcePlan
 *
 * @api                {POST} /v1/resource-plan Endpoint title here..
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
$router->post('resource-plan', [
    'as' => 'api_resourceplan_create_resource_plan',
    'uses'  => 'Controller@createResourcePlan',
    'middleware' => [
      'auth:api',
    ],
]);
