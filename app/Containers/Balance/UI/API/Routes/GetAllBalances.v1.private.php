<?php

/**
 * @apiGroup           Balance
 * @apiName            getAllBalances
 *
 * @api                {GET} /v1/balances Endpoint title here..
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
$router->get('balances', [
    'as' => 'api_balance_get_all_balances',
    'uses'  => 'Controller@getAllBalances',
    'middleware' => [
      'auth:api',
    ],
]);
