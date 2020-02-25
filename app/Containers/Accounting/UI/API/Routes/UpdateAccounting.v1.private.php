<?php

/**
 * @apiGroup           Accounting
 * @apiName            updateAccounting
 *
 * @api                {PATCH} /v1/accountings/:id Endpoint title here..
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
$router->patch('accountings/{id}', [
    'as' => 'api_accounting_update_accounting',
    'uses'  => 'Controller@updateAccounting',
    'middleware' => [
      'auth:api',
    ],
]);
