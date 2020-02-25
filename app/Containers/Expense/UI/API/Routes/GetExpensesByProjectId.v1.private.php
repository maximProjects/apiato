<?php

/**
 * @apiGroup           Expense
 * @apiName            getExpensesByProjectId
 *
 * @api                {GET} /v1/projects/:id/expenses Endpoint title here..
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
$router->get('projects/{id}/expenses', [
    'as' => 'api_expense_get_expenses_by_project_id',
    'uses'  => 'Controller@getExpensesByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
