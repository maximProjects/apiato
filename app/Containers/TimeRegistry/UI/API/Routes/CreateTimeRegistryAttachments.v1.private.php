<?php

/**
 * @apiGroup           TimeRegistry
 * @apiName            createTimeRegistryAttachments
 *
 * @api                {POST} /v1/timeregistries/:id/attachments Endpoint title here..
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
$router->post('time-registry/{id}/attachments', [
    'as' => 'api_timeregistry_create_time_registry_attachments',
    'uses'  => 'Controller@createTimeRegistryAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
