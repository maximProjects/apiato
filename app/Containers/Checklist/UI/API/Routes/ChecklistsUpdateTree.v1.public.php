<?php

/**
 * @apiGroup           Checklist
 * @apiName            updateTree
 *
 * @api                {POST} /v1/checklists/update-tree Endpoint title here..
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
$router->post('checklists/update-tree', [
    'as' => 'api_checklist_update_tree',
    'uses'  => 'Controller@updateTree',
    'middleware' => [
      'auth:api',
    ],
]);
