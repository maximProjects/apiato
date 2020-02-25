<?php

/**
 * @apiGroup           Accounting
 * @apiName            getAllAccountings
 *
 * @api                {GET} /v1/accountings Endpoint title here..
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
$router->get('accountings', [
    'as' => 'api_accounting_get_all_accountings',
    'uses'  => 'Controller@getAllAccountings',
    'middleware' => [
      'auth:api',
    ],
]);
