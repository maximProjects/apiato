<?php

/**
 * @apiGroup           Discrepancy
 * @apiName            updateDiscrepancy
 *
 * @api                {PATCH} /v1/discrepancies/:id Endpoint title here..
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
$router->patch('discrepancies/{id}', [
    'as' => 'api_discrepancy_update_discrepancy',
    'uses'  => 'Controller@updateDiscrepancy',
    'middleware' => [
      'auth:api',
    ],
]);
