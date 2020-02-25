<?php

/**
 * @apiGroup           Discrepancy
 * @apiName            deleteDiscrepancy
 *
 * @api                {DELETE} /v1/discrepancies/:id Endpoint title here..
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
$router->delete('discrepancies/{id}', [
    'as' => 'api_discrepancy_delete_discrepancy',
    'uses'  => 'Controller@deleteDiscrepancy',
    'middleware' => [
      'auth:api',
    ],
]);
