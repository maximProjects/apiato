<?php

/**
 * @apiGroup           TimeRegistry
 * @apiName            getMessagesByProjectId
 *
 * @api                {PROJECTS/{ID}/TIMEREGISTRY} /v1/projects/:id/messages Endpoint title here..
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
$router->get('projects/{id}/time-registry', [
    'as' => 'api_timeregistry_get_time_registry_by_project_id',
    'uses'  => 'Controller@getTimeRegistryByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
