<?php

/**
 * @apiGroup           Statistic
 * @apiName            getAllStatistics
 *
 * @api                {GET} /v1/statistics Endpoint title here..
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
$router->get('statistics', [
    'as' => 'api_statistic_get_all_statistics',
    'uses'  => 'Controller@getAllStatistics',
    'middleware' => [
      'auth:api',
    ],
]);
