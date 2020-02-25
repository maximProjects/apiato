<?php

/**
 * @apiGroup           Invoice
 * @apiName            findInvoiceById
 *
 * @api                {GET} /v1/invoices/:id Endpoint title here..
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
$router->get('invoices/{id}', [
    'as' => 'api_invoice_find_invoice_by_id',
    'uses'  => 'Controller@findInvoiceById',
    'middleware' => [
      'auth:api',
    ],
]);
