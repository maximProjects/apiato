<?php

/**
 * @apiGroup           Routine
 * @apiName            deleteRoutine
 *
 * @api                {DELETE} /v1/routines/:id Endpoint title here..
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
$router->delete('routines/{id}', [
    'as' => 'api_routine_delete_routine',
    'uses'  => 'Controller@deleteRoutine',
    'middleware' => [
      'auth:api',
    ],
]);
