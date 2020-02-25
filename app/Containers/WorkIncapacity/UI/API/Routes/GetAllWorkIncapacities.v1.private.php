<?php

/**
 * @apiGroup           WorkIncapacity
 * @apiName            getAllWorkIncapacities
 *
 * @api                {GET} /v1/work-incapacities Endpoint title here..
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
$router->get('work-incapacities', [
    'as' => 'api_workincapacity_get_all_work_incapacities',
    'uses'  => 'Controller@getAllWorkIncapacities',
    'middleware' => [
      'auth:api',
    ],
]);
