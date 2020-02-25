<?php

/**
 * @apiGroup           WorkIncapacity
 * @apiName            deleteWorkIncapacity
 *
 * @api                {DELETE} /v1/work-incapacities/:id Endpoint title here..
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
$router->delete('work-incapacities/{id}', [
    'as' => 'api_workincapacity_delete_work_incapacity',
    'uses'  => 'Controller@deleteWorkIncapacity',
    'middleware' => [
      'auth:api',
    ],
]);
