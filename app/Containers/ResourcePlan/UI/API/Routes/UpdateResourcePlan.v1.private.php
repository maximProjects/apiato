<?php

/**
 * @apiGroup           ResourcePlan
 * @apiName            updateResourcePlan
 *
 * @api                {PATCH} /v1/resource-plan/:id Endpoint title here..
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
$router->patch('resource-plan/{id}', [
    'as' => 'api_resourceplan_update_resource_plan',
    'uses'  => 'Controller@updateResourcePlan',
    'middleware' => [
      'auth:api',
    ],
]);
