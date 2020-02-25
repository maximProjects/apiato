<?php

/**
 * @apiGroup           Accounting
 * @apiName            findAccountingById
 *
 * @api                {GET} /v1/accountings/:id Endpoint title here..
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
$router->get('accountings/{id}', [
    'as' => 'api_accounting_find_accounting_by_id',
    'uses'  => 'Controller@findAccountingById',
    'middleware' => [
      'auth:api',
    ],
]);
