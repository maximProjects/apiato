<?php

/**
 * @apiGroup           ReportType
 * @apiName            getAllReportTypes
 *
 * @api                {GET} /v1/report_types Endpoint title here..
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
$router->get('report_types', [
    'as' => 'api_reporttype_get_all_report_types',
    'uses'  => 'Controller@getAllReportTypes',
    'middleware' => [
      'auth:api',
    ],
]);
