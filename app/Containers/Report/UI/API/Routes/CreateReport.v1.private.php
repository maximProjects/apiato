<?php

/**
 * @apiGroup           Report
 * @apiName            createReport
 *
 * @api                {POST} /v1/reports Endpoint title here..
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
$router->post('reports', [
    'as' => 'api_report_create_report',
    'uses'  => 'Controller@createReport',
    'middleware' => [
      'auth:api',
    ],
]);
