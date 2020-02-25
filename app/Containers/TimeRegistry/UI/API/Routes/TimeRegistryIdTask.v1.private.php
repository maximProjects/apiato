<?php

/**
 * @apiGroup           TimeRegistry
 * @apiName            timeRegistryIdTask
 *
 * @api                {POST} /v1/timeregistry/:id/task Endpoint title here..
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
$router->post('time-registry/{id}/task', [
    'as' => 'api_timeregistry_time_registry_id_task',
    'uses'  => 'Controller@timeRegistryIdTask',
    'middleware' => [
      'auth:api',
    ],
]);
