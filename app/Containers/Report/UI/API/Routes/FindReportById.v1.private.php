<?php

/**
 * @apiGroup           Report
 * @apiName            findReportById
 *
 * @api                {GET} /v1/reports/:id Endpoint title here..
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
$router->get('reportsDIsabled/{id}', [
    'as' => 'api_report_find_report_by_id',
    'uses'  => 'Controller@findReportById',
    'middleware' => [
      'auth:api',
    ],
]);
