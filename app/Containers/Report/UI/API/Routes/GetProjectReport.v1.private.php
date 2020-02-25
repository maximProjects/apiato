<?php

/**
 * @apiGroup           Report
 * @apiName            getProjectReport
 *
 * @api                {GET} /v1/reports/project-report Endpoint title here..
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
$router->get('reports/project-report', [
    'as' => 'api_report_get_project_report',
    'uses'  => 'Controller@getProjectReport',
    'middleware' => [
      'auth:api',
    ],
]);
