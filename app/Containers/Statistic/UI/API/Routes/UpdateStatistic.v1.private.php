<?php

/**
 * @apiGroup           Statistic
 * @apiName            updateStatistic
 *
 * @api                {PATCH} /v1/statistics/:id Endpoint title here..
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
$router->patch('statistics/{id}', [
    'as' => 'api_statistic_update_statistic',
    'uses'  => 'Controller@updateStatistic',
    'middleware' => [
      'auth:api',
    ],
]);
