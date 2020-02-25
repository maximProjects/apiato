<?php

/**
 * @apiGroup           JobType
 * @apiName            deleteJobType
 *
 * @api                {DELETE} /v1/job-types/:id Endpoint title here..
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
$router->delete('job-types/{id}', [
    'as' => 'api_jobtype_delete_job_type',
    'uses'  => 'Controller@deleteJobType',
    'middleware' => [
      'auth:api',
    ],
]);
