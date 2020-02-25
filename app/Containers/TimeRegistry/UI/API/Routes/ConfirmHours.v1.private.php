<?php

/**
 * @apiGroup           TimeRegistry
 * @apiName            confirmHours
 *
 * @api                {} /v1/time-registry/:id/confirm-hours Endpoint title here..
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
$router->post('time-registry/{id}/confirm-hours', [
    'as' => 'api_timeregistry_confirm_hours',
    'uses'  => 'Controller@confirmHours',
    'middleware' => [
      'auth:api',
    ],
]);
