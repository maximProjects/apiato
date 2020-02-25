<?php

/**
 * @apiGroup           Checklist
 * @apiName            checklistsImport
 *
 * @api                {POST} /v1/checklists/import Endpoint title here..
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
$router->post('checklists/import', [
    'as' => 'api_checklist_checklists_import',
    'uses'  => 'Controller@checklistsImport',
    'middleware' => [
      'auth:api',
    ],
]);
