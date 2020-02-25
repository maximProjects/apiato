<?php

/**
 * @apiGroup           TimeRegistry
 * @apiName            getTimeRegistryAttachments
 *
 * @api                {GET} /v1/time-registry/:id/attachments Endpoint title here..
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
$router->get('time-registry/{id}/attachments', [
    'as' => 'api_timeregistry_get_time_registry_attachments',
    'uses'  => 'Controller@getTimeRegistryAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
