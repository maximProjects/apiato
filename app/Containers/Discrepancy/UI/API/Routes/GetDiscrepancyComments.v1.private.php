<?php

/**
 * @apiGroup           Discrepancy
 * @apiName            getDiscrepancyComments
 *
 * @api                {GET} /v1/discrepanies/:id/comments Endpoint title here..
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
$router->get('discrepancies/{id}/comments', [
    'as' => 'api_discrepancy_get_discrepancy_comments',
    'uses'  => 'Controller@getDiscrepancyComments',
    'middleware' => [
      'auth:api',
    ],
]);
