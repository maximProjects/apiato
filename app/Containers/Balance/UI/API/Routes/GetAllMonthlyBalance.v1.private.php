<?php

/**
 * @apiGroup           Balance
 * @apiName            getAllMonthlyBalances
 *
 * @api                {GET} /v1/balances/monthlybalances Endpoint title here..
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
$router->get('monthlybalances', [
    'as' => 'api_balance_get_all_monthly_balances',
    'uses'  => 'Controller@getAllMonthlyBalances',
    'middleware' => [
      'auth:api',
    ],
]);
