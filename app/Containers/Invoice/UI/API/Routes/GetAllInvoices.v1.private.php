<?php

/**
 * @apiGroup           Invoice
 * @apiName            getAllInvoices
 *
 * @api                {GET} /v1/invoices Endpoint title here..
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
$router->get('invoices', [
    'as' => 'api_invoice_get_all_invoices',
    'uses'  => 'Controller@getAllInvoices',
    'middleware' => [
      'auth:api',
    ],
]);
