<?php

/**
 * @apiGroup           Job
 * @apiName            getJobComments
 *
 * @api                {GET} /v1/jobs/:id/comments Endpoint title here..
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
$router->get('jobs/{id}/comments', [
    'as' => 'api_job_get_job_comments',
    'uses'  => 'Controller@getJobComments',
    'middleware' => [
      'auth:api',
    ],
]);
