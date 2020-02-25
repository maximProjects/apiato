<?php

/**
 * @apiGroup           Manager
 * @apiName            getAllManagers
 *
 * @api                {GET} /v1/managers Endpoint title here..
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
$router->get('managers', [
    'as' => 'api_manager_get_all_managers',
    'uses'  => 'Controller@getAllManagers',
    'middleware' => [
      'auth:api',
    ],
]);
