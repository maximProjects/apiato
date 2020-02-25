<?php

/**
 * @apiGroup           JobType
 * @apiName            updateJobType
 *
 * @api                {PATCH} /v1/job-types/:id Endpoint title here..
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
$router->patch('job-types/{id}', [
    'as' => 'api_jobtype_update_job_type',
    'uses'  => 'Controller@updateJobType',
    'middleware' => [
      'auth:api',
    ],
]);
