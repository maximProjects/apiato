<?php

/**
 * @apiGroup           Routine
 * @apiName            getAllRoutines
 *
 * @api                {GET} /v1/routines Endpoint title here..
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
$router->get('routines', [
    'as' => 'api_routine_get_all_routines',
    'uses'  => 'Controller@getAllRoutines',
    'middleware' => [
      'auth:api',
    ],
]);
