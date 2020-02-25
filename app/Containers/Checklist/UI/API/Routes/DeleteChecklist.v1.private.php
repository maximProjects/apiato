<?php

/**
 * @apiGroup           Checklist
 * @apiName            deleteChecklist
 *
 * @api                {DELETE} /v1/checklists/:id Endpoint title here..
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
$router->delete('checklists/{id}', [
    'as' => 'api_checklist_delete_checklist',
    'uses'  => 'Controller@deleteChecklist',
    'middleware' => [
      'auth:api',
    ],
]);
