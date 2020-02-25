<?php

/**
 * @apiGroup           TimeRegistry
 * @apiName            finishTimeRegistry
 *
 * @api                {POST} /v1/time-registry/finish Endpoint title here..
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
$router->post('time-registry/finish', [
    'as' => 'api_timeregistry_finish_time_registry',
    'uses'  => 'Controller@finishTimeRegistry',
    'middleware' => [
      'auth:api',
    ],
]);
