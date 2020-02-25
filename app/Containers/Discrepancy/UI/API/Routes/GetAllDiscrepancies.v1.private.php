<?php

/**
 * @apiGroup           Discrepancy
 * @apiName            getAllDiscrepancies
 *
 * @api                {GET} /v1/discrepancies Endpoint title here..
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
$router->get('discrepancies', [
    'as' => 'api_discrepancy_get_all_discrepancies',
    'uses'  => 'Controller@getAllDiscrepancies',
    'middleware' => [
      'auth:api',
    ],
]);
