<?php

/**
 * @apiGroup           Checklist
 * @apiName            createChecklistComments
 *
 * @api                {POST} /v1/checklists/:id/comments Endpoint title here..
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
$router->post('checklists/{id}/comments', [
    'as' => 'api_checklist_create_checklist_comments',
    'uses'  => 'Controller@createChecklistComments',
    'middleware' => [
      'auth:api',
    ],
]);
