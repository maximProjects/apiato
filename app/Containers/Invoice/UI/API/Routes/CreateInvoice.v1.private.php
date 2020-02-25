<?php

/**
 * @apiGroup           Invoice
 * @apiName            createInvoice
 *
 * @api                {POST} /v1/invoices Endpoint title here..
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
$router->post('invoices', [
    'as' => 'api_invoice_create_invoice',
    'uses'  => 'Controller@createInvoice',
    'middleware' => [
      'auth:api',
    ],
]);
