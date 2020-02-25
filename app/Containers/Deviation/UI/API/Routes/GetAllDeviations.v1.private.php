<?php

/**
 * @apiGroup           Deviation
 * @apiName            getAllDeviations
 *
 * @api                {GET} /v1/deviations Endpoint title here..
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
$router->get('deviations', [
    'as' => 'api_deviation_get_all_deviations',
    'uses'  => 'Controller@getAllDeviations',
    'middleware' => [
      'auth:api',
    ],
]);
