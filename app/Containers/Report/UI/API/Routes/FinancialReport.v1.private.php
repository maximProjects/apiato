<?php

/**
 * @apiGroup           Report
 * @apiName            getFinancialReport
 *
 * @api                {GET} /v1/reports/financial-report Endpoint title here..
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
$router->get('reports/financial-report', [
    'as' => 'api_report_get_financial_report',
    'uses'  => 'Controller@getFinancialReport',
    'middleware' => [
      'auth:api',
    ],
]);
