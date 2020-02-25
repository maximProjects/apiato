<?php

/**
 * @apiGroup           Balance
 * @apiName            createMonthlyHour
 *
 * @api                {POST} /v1/balances/monthlyhours Endpoint title here..
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
$router->post('balances/monthlyhours', [
    'as' => 'api_balance_create_monthly_hour',
    'uses'  => 'Controller@createMonthlyHour',
    'middleware' => [
      'auth:api',
    ],
]);
