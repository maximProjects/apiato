<?php

/**
 * @apiGroup           TimeRegistry
 * @apiName            getAllTimeRegistries
 *
 * @api                {GET} /v1/time_registry Endpoint title here..
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
$router->get('time-registry', [
    'as' => 'api_timeregistry_get_all_time_registries',
    'uses'  => 'Controller@getAllTimeRegistries',
    'middleware' => [
      'auth:api',
    ],
]);
