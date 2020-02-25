<?php

/**
 * @apiGroup           WorkIncapacity
 * @apiName            updateWorkIncapacity
 *
 * @api                {PATCH} /v1/work-incapacities/:id Endpoint title here..
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
$router->patch('work-incapacities/{id}', [
    'as' => 'api_workincapacity_update_work_incapacity',
    'uses'  => 'Controller@updateWorkIncapacity',
    'middleware' => [
      'auth:api',
    ],
]);
