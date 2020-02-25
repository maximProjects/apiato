<?php

/**
 * @apiGroup           ReportType
 * @apiName            findReportTypeById
 *
 * @api                {GET} /v1/report_types/:id Endpoint title here..
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
$router->get('report_types/{id}', [
    'as' => 'api_reporttype_find_report_type_by_id',
    'uses'  => 'Controller@findReportTypeById',
    'middleware' => [
      'auth:api',
    ],
]);
