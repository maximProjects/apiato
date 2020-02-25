<?php

/**
 * @apiGroup           Job
 * @apiName            getJobAttachments
 *
 * @api                {GET} /v1/jobs/:id/attachments Endpoint title here..
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
$router->get('jobs/{id}/attachments', [
    'as' => 'api_job_get_job_attachments',
    'uses'  => 'Controller@getJobAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
