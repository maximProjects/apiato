<?php

/**
 * @apiGroup           Expense
 * @apiName            getExpenseAttachments
 *
 * @api                {GET} /v1/expenses/:id/attachments Endpoint title here..
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
$router->get('expenses/{id}/attachments', [
    'as' => 'api_expense_get_expense_attachments',
    'uses'  => 'Controller@getExpenseAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
