<?php

/**
 * @apiGroup           Statistic
 * @apiName            deleteStatistic
 *
 * @api                {DELETE} /v1/statistics/:id Endpoint title here..
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
$router->delete('statistics/{id}', [
    'as' => 'api_statistic_delete_statistic',
    'uses'  => 'Controller@deleteStatistic',
    'middleware' => [
      'auth:api',
    ],
]);
