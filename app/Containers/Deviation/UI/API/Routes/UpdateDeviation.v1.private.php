<?php

/**
 * @apiGroup           Deviation
 * @apiName            updateDeviation
 *
 * @api                {PATCH} /v1/deviations/:id Endpoint title here..
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
$router->patch('deviations/{id}', [
    'as' => 'api_deviation_update_deviation',
    'uses'  => 'Controller@updateDeviation',
    'middleware' => [
      'auth:api',
    ],
]);
