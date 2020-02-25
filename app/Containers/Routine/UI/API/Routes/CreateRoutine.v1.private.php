<?php

/**
 * @apiGroup           Routine
 * @apiName            createRoutine
 *
 * @api                {POST} /v1/routines Endpoint title here..
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
$router->post('routines', [
    'as' => 'api_routine_create_routine',
    'uses'  => 'Controller@createRoutine',
    'middleware' => [
      'auth:api',
    ],
]);
