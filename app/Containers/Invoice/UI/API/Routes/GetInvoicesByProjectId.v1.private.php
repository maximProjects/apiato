<?php

/**
 * @apiGroup           Invoice
 * @apiName            getInvoicesByProjectId
 *
 * @api                {GET} /v1/projects/:id/invoices Endpoint title here..
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
$router->get('projects/{id}/invoices', [
    'as' => 'api_invoice_get_invoices_by_project_id',
    'uses'  => 'Controller@getInvoicesByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
