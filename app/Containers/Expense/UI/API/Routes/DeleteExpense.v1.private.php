<?php

/**
 * @apiGroup           Expense
 * @apiName            deleteExpense
 *
 * @api                {DELETE} /vall/expense/:id Endpoint title here..
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
$router->delete('expenses/{id}', [
    'as' => 'api_expense_delete_expense',
    'uses'  => 'Controller@deleteExpense',
    'middleware' => [
      'auth:api',
    ],
]);
