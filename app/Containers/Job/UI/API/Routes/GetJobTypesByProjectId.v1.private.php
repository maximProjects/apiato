<?php

/**
 * @apiGroup           Job
 * @apiName            getJobTypesByProjectId
 *
 * @api                {GET} /v1/projects/:id/job-types Endpoint title here..
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
$router->get('projects/{id}/job-types', [
    'as' => 'api_job_get_job_types_by_project_id',
    'uses'  => 'Controller@getJobTypesByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
