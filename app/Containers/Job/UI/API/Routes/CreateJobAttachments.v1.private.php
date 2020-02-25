<?php

/**
 * @apiGroup           Job
 * @apiName            createJebAttachments
 *
 * @api                {POST} /v1/jobs/:id/attachments Endpoint title here..
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
$router->post('jobs/{id}/attachments', [
    'as' => 'api_job_create_job_attachments',
    'uses'  => 'Controller@createJobAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
