<?php

/**
 * @apiGroup           Expense
 * @apiName            createExpense
 *
 * @api                {POST} /vall/expense Endpoint title here..
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
$router->post('expenses', [
    'as' => 'api_expense_create_expense',
    'uses'  => 'Controller@createExpense',
    'middleware' => [
      'auth:api',
    ],
]);
