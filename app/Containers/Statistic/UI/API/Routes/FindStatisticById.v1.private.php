<?php

/**
 * @apiGroup           Statistic
 * @apiName            findStatisticById
 *
 * @api                {GET} /v1/statistics/:id Endpoint title here..
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
$router->get('statistics/{id}', [
    'as' => 'api_statistic_find_statistic_by_id',
    'uses'  => 'Controller@findStatisticById',
    'middleware' => [
      'auth:api',
    ],
]);
