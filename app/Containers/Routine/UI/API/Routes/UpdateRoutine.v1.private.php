<?php

/**
 * @apiGroup           Routine
 * @apiName            updateRoutine
 *
 * @api                {PATCH} /v1/routines/:id Endpoint title here..
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
$router->patch('routines/{id}', [
    'as' => 'api_routine_update_routine',
    'uses'  => 'Controller@updateRoutine',
    'middleware' => [
      'auth:api',
    ],
]);
