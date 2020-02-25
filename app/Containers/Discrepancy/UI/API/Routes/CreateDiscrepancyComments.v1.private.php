<?php

/**
 * @apiGroup           Discrepancy
 * @apiName            createDiscrepancyComments
 *
 * @api                {POST} /v1/discrepanies/:id/comments Endpoint title here..
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
$router->post('discrepancies/{id}/comments', [
    'as' => 'api_discrepancy_create_discrepancy_comments',
    'uses'  => 'Controller@createDiscrepancyComments',
    'middleware' => [
      'auth:api',
    ],
]);
