<?php

/**
 * @apiGroup           WorkIncapacity
 * @apiName            findWorkIncapacityTypeById
 *
 * @api                {GET} /v1/workincapacitytypes/:id Endpoint title here..
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
$router->get('work-incapacitytypes/{id}', [
    'as' => 'api_workincapacitytype_find_work_incapacity_type_by_id',
    'uses'  => 'Controller@findWorkIncapacityTypeById',
    'middleware' => [
      'auth:api',
    ],
]);
