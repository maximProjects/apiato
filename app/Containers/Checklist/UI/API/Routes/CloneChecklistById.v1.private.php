<?php

/**
 * @apiGroup           Checklist
 * @apiName            cloneChecklist
 *
 * @api                {POST} /v1/checklist/clone Endpoint title here..
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
$router->post('checklists/clone', [
    'as' => 'api_checklist_clone_checklist',
    'uses'  => 'Controller@cloneChecklistById',
    'middleware' => [
      'auth:api',
    ],
]);
