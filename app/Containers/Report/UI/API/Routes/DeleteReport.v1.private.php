<?php

/**
 * @apiGroup           Report
 * @apiName            deleteReport
 *
 * @api                {DELETE} /v1/reports/:id Endpoint title here..
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
$router->delete('reports/{id}', [
    'as' => 'api_report_delete_report',
    'uses'  => 'Controller@deleteReport',
    'middleware' => [
      'auth:api',
    ],
]);
