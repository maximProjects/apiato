<?php

/**
 * @apiGroup           Checklist
 * @apiName            findChecklistById
 *
 * @api                {GET} /v1/checklists/:id Endpoint title here..
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
$router->get('checklists/{id}', [
    'as' => 'api_checklist_find_checklist_by_id',
    'uses'  => 'Controller@findChecklistById',
    'middleware' => [
      'auth:api',
    ],
]);
