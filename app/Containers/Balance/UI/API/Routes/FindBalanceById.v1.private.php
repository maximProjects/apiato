<?php

/**
 * @apiGroup           Balance
 * @apiName            findBalanceById
 *
 * @api                {GET} /v1/balances/:id Endpoint title here..
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
$router->get('balances/{id}', [
    'as' => 'api_balance_find_balance_by_id',
    'uses'  => 'Controller@findBalanceById',
    'middleware' => [
      'auth:api',
    ],
]);
