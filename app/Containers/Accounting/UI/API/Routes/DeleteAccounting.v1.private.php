<?php

/**
 * @apiGroup           Accounting
 * @apiName            deleteAccounting
 *
 * @api                {DELETE} /v1/accountings/:id Endpoint title here..
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
$router->delete('accountings/{id}', [
    'as' => 'api_accounting_delete_accounting',
    'uses'  => 'Controller@deleteAccounting',
    'middleware' => [
      'auth:api',
    ],
]);
