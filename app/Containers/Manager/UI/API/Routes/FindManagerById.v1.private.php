<?php

/**
 * @apiGroup           Manager
 * @apiName            findManagerById
 *
 * @api                {GET} /v1/managers/:id Endpoint title here..
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
$router->get('managers/{id}', [
    'as' => 'api_manager_find_manager_by_id',
    'uses'  => 'Controller@findManagerById',
    'middleware' => [
      'auth:api',
    ],
]);
