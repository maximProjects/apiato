<?php

/**
 * @apiGroup           Balance
 * @apiName            updateMonthlyBalance
 *
 * @api                {PATCH} /vupdateMonthlyBalance/balances/monthlybalances/:id Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         updateMonthlyBalance.0.0
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
$router->patch('balances/monthlybalances/{id}', [
    'as' => 'api_balance_update_monthly_balance',
    'uses'  => 'Controller@updateMonthlyBalance',
    'middleware' => [
      'auth:api',
    ],
]);
