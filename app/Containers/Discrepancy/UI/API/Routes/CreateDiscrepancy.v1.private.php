<?php

/**
 * @apiGroup           Discrepancy
 * @apiName            createDiscrepancy
 *
 * @api                {POST} /v1/discrepancies Endpoint title here..
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
$router->post('discrepancies', [
    'as' => 'api_discrepancy_create_discrepancy',
    'uses'  => 'Controller@createDiscrepancy',
    'middleware' => [
      'auth:api',
    ],
]);
