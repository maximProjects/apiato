<?php

/**
 * @apiGroup           WorkIncapacity
 * @apiName            getAllWorkIncapacityTypes
 *
 * @api                {GET} /v1/workincapacitytypes Endpoint title here..
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
$router->get('work-incapacity-types', [
    'as' => 'api_workincapacitytype_get_all_work_incapacity_types',
    'uses'  => 'Controller@getAllWorkIncapacityTypes',
    'middleware' => [
      'auth:api',
    ],
]);
