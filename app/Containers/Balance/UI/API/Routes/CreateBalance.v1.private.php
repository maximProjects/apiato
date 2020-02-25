<?php

/**
 * @apiGroup           Balance
 * @apiName            createBalance
 *
 * @api                {POST} /v1/balances Endpoint title here..
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
$router->post('balances', [
    'as' => 'api_balance_create_balance',
    'uses'  => 'Controller@createBalance',
    'middleware' => [
      'auth:api',
    ],
]);
