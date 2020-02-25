<?php

/**
 * @apiGroup           Message
 * @apiName            getMessageComments
 *
 * @api                {GET} /v1/messages/:id/comments Endpoint title here..
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
$router->get('messages/{id}/comments', [
    'as' => 'api_message_get_message_comments',
    'uses'  => 'Controller@getMessageComments',
    'middleware' => [
      'auth:api',
    ],
]);
