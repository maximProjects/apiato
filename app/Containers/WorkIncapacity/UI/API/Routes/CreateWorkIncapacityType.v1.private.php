<?php

/**
 * @apiGroup           WorkIncapacity
 * @apiName            createWorkIncapacityType
 *
 * @api                {POST} /v1/workincapacitytypes Endpoint title here..
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
$router->post('work-incapacity-types', [
    'as' => 'api_workincapacitytype_create_work_incapacity_type',
    'uses'  => 'Controller@createWorkIncapacityType',
    'middleware' => [
      'auth:api',
    ],
]);
