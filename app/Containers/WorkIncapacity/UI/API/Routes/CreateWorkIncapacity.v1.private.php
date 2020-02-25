<?php

/**
 * @apiGroup           WorkIncapacity
 * @apiName            createWorkIncapacity
 *
 * @api                {POST} /v1/work-incapacities Endpoint title here..
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
$router->post('work-incapacities', [
    'as' => 'api_workincapacity_create_work_incapacity',
    'uses'  => 'Controller@createWorkIncapacity',
    'middleware' => [
      'auth:api',
    ],
]);
