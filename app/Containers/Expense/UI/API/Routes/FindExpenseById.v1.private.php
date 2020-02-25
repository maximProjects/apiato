<?php

/**
 * @apiGroup           Expense
 * @apiName            findExpenseById
 *
 * @api                {GET} /vall/expense/:id Endpoint title here..
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
$router->get('expenses/{id}', [
    'as' => 'api_expense_find_expense_by_id',
    'uses'  => 'Controller@findExpenseById',
    'middleware' => [
      'auth:api',
    ],
]);
