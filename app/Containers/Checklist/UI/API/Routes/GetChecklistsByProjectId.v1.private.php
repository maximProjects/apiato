<?php

/**
 * @apiGroup           Checklist
 * @apiName            getChecklistsByProjectId
 *
 * @api                {GET} /v1/projects/:id/checklists Endpoint title here..
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
$router->get('projects/{id}/checklists', [
    'as' => 'api_checklist_get_checklists_by_project_id',
    'uses'  => 'Controller@getChecklistsByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
