<?php

/**
 * @apiGroup           Deviation
 * @apiName            deleteDeviation
 *
 * @api                {DELETE} /v1/deviations/:id Endpoint title here..
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
$router->delete('deviations/{id}', [
    'as' => 'api_deviation_delete_deviation',
    'uses'  => 'Controller@deleteDeviation',
    'middleware' => [
      'auth:api',
    ],
]);
