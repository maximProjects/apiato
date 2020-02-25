<?php

/**
 * @apiGroup           Statistic
 * @apiName            createStatistic
 *
 * @api                {POST} /v1/statistics Endpoint title here..
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
$router->post('statistics', [
    'as' => 'api_statistic_create_statistic',
    'uses'  => 'Controller@createStatistic',
    'middleware' => [
      'auth:api',
    ],
]);
