<?php

/**
 * @apiGroup           ReportType
 * @apiName            createReportType
 *
 * @api                {POST} /v1/report_types Endpoint title here..
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
$router->post('report_types', [
    'as' => 'api_reporttype_create_report_type',
    'uses'  => 'Controller@createReportType',
    'middleware' => [
      'auth:api',
    ],
]);
