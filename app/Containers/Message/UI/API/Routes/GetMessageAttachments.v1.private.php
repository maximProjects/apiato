<?php

/**
 * @apiGroup           Message
 * @apiName            getMessageAttachments
 *
 * @api                {GET} /v1/messages/:id/attachments Endpoint title here..
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
$router->get('messages/{id}/attachments', [
    'as' => 'api_message_get_message_attachments',
    'uses'  => 'Controller@getMessageAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
