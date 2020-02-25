<?php

/**
 * @apiGroup           WorkIncapacity
 * @apiName            findWorkIncapacityById
 *
 * @api                {GET} /v1/work-incapacities/:id Endpoint title here..
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
$router->get('work-incapacities/{id}', [
    'as' => 'api_workincapacity_find_work_incapacity_by_id',
    'uses'  => 'Controller@findWorkIncapacityById',
    'middleware' => [
      'auth:api',
    ],
]);
