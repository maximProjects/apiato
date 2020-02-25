<?php

/**
 * @apiGroup           JobType
 * @apiName            findJobTypeById
 *
 * @api                {GET} /v1/job-types/:id Endpoint title here..
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
$router->get('job-types/{id}', [
    'as' => 'api_jobtype_find_job_type_by_id',
    'uses'  => 'Controller@findJobTypeById',
    'middleware' => [
      'auth:api',
    ],
]);
