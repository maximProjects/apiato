<?php

/**
 * @apiGroup           TimeRegistry
 * @apiName            timeRegistryIdSubmit
 *
 * @api                {POST} /v1/time-registry/:id/submit Endpoint title here..
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
$router->post('time-registry/{id}/submit', [
    'as' => 'api_timeregistry_time_registry_id_submit',
    'uses'  => 'Controller@timeRegistryIdSubmit',
    'middleware' => [
      'auth:api',
    ],
]);
