<?php

/**
 * @apiGroup           Balance
 * @apiName            createMonthlyBalance
 *
 * @api                {POST} /v1/balances/monthlybalances Endpoint title here..
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
$router->post('balances/monthlybalances', [
    'as' => 'api_balance_create_monthly_balance',
    'uses'  => 'Controller@createMonthlyBalance',
    'middleware' => [
      'auth:api',
    ],
]);
