<?php

/**
 * @apiGroup           Message
 * @apiName            updateMessage
 *
 * @api                {PATCH} /v1/messages/:id Endpoint title here..
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
$router->patch('messages/{id}', [
    'as' => 'api_message_update_message',
    'uses'  => 'Controller@updateMessage',
    'middleware' => [
      'auth:api',
    ],
]);
