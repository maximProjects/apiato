<?php

/**
 * @apiGroup           JobType
 * @apiName            getAllJobTypes
 *
 * @api                {GET} /v1/job-types Endpoint title here..
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
$router->get('job-types', [
    'as' => 'api_jobtype_get_all_job_types',
    'uses'  => 'Controller@getAllJobTypes',
    'middleware' => [
      'auth:api',
    ],
]);
