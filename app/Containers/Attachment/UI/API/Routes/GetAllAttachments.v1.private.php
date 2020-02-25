<?php

/**
 * @apiGroup           Attachment
 * @apiName            getAllAttachments
 *
 * @api                {GET} /v1/attachments Endpoint title here..
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
$router->get('attachments', [
    'as' => 'api_attachment_get_all_attachments',
    'uses'  => 'Controller@getAllAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
