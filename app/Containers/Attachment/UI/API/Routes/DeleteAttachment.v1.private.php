<?php

/**
 * @apiGroup           Attachment
 * @apiName            deleteAttachment
 *
 * @api                {DELETE} /v1/attachments/:id Endpoint title here..
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
$router->delete('attachments/{id}', [
    'as' => 'api_attachment_delete_attachment',
    'uses'  => 'Controller@deleteAttachment',
    'middleware' => [
      'auth:api',
    ],
]);
