<?php

/**
 * @apiGroup           Balance
 * @apiName            updateMonthlyHour
 *
 * @api                {PATCH} /v1/balances/monthlyhours/:id Endpoint title here..
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
$router->patch('balances/monthlyhours/{id}', [
    'as' => 'api_balance_update_monthly_hour',
    'uses'  => 'Controller@updateMonthlyHour',
    'middleware' => [
      'auth:api',
    ],
]);
