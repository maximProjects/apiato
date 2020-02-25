<?php

/**
 * @apiGroup           Message
 * @apiName            createMessageComments
 *
 * @api                {POST} /v1/messages/:id/comments Endpoint title here..
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
$router->post('messages/{id}/comments', [
    'as' => 'api_messages_create_message_comments',
    'uses'  => 'Controller@createMessageComments',
    'middleware' => [
      'auth:api',
    ],
]);
