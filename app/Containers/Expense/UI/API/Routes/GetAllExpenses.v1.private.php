<?php

/**
 * @apiGroup           Expense
 * @apiName            getAllExpenses
 *
 * @api                {GET} /vall/expense Endpoint title here..
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
$router->get('expenses', [
    'as' => 'api_expense_get_all_expenses',
    'uses'  => 'Controller@getAllExpenses',
    'middleware' => [
      'auth:api',
    ],
]);
