<?php

/**
 * @apiGroup           ReportType
 * @apiName            updateReportType
 *
 * @api                {PATCH} /v1/report_types/:id Endpoint title here..
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
$router->patch('report_types/{id}', [
    'as' => 'api_reporttype_update_report_type',
    'uses'  => 'Controller@updateReportType',
    'middleware' => [
      'auth:api',
    ],
]);
