<?php

/**
 * @apiGroup           WorkIncapacity
 * @apiName            updateWorkIncapacityType
 *
 * @api                {PATCH} /v1/workincapacitytypes/:id Endpoint title here..
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
$router->patch('work-incapacity-types/{id}', [
    'as' => 'api_workincapacitytype_update_work_incapacity_type',
    'uses'  => 'Controller@updateWorkIncapacityType',
    'middleware' => [
      'auth:api',
    ],
]);
