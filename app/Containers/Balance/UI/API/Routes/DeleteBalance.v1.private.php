<?php

/**
 * @apiGroup           Balance
 * @apiName            deleteBalance
 *
 * @api                {DELETE} /v1/balances/:id Endpoint title here..
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
$router->delete('balances/{id}', [
    'as' => 'api_balance_delete_balance',
    'uses'  => 'Controller@deleteBalance',
    'middleware' => [
      'auth:api',
    ],
]);
