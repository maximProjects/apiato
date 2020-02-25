<?php

/**
 * @apiGroup           Job
 * @apiName            createJobType
 *
 * @api                {POST} /v1/job-types Endpoint title here..
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
$router->post('job-types', [
    'as' => 'api_job_create_job_type',
    'uses'  => 'Controller@createJobType',
    'middleware' => [
      'auth:api',
    ],
]);
