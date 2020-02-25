<?php

/**
 * @apiGroup           Checklist
 * @apiName            getAllChecklists
 *
 * @api                {GET} /v1/checklists Endpoint title here..
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
$router->get('checklists', [
    'as' => 'api_checklist_get_all_checklists',
    'uses'  => 'Controller@getAllChecklists',
    'middleware' => [
      'auth:api',
    ],
]);
