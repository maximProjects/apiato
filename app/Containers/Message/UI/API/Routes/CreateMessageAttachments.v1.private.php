<?php

/**
 * @apiGroup           Message
 * @apiName            createMessageAttachments
 *
 * @api                {POST} /v1/messages/:id/attachments Endpoint title here..
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
$router->post('messages/{id}/attachments', [
    'as' => 'api_message_create_message_attachments',
    'uses'  => 'Controller@createMessageAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
