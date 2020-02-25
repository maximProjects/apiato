<?php

/**
 * @apiGroup           Attachment
 * @apiName            createAttachment
 *
 * @api                {POST} /v1/attachments Endpoint title here..
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
$router->post('attachments', [
    'as' => 'api_attachment_create_attachment',
    'uses'  => 'Controller@createAttachment',
    'middleware' => [
      'auth:api',
    ],
]);
