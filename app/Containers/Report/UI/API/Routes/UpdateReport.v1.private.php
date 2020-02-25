<?php

/**
 * @apiGroup           Report
 * @apiName            updateReport
 *
 * @api                {PATCH} /v1/reports/:id Endpoint title here..
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
$router->patch('reports/{id}', [
    'as' => 'api_report_update_report',
    'uses'  => 'Controller@updateReport',
    'middleware' => [
      'auth:api',
    ],
]);
