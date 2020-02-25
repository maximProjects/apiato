<?php

/**
 * @apiGroup           Checklist
 * @apiName            checklistsTree
 *
 * @api                {POST} /v1/checklists/tree Endpoint title here..
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
$router->post('checklists/tree', [
    'as' => 'api_checklist_checklists_tree',
    'uses'  => 'Controller@checklistsTree',
    'middleware' => [
      'auth:api',
    ],
]);
