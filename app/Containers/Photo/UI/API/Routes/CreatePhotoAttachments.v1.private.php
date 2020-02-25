<?php

/**
 * @apiGroup           Photo
 * @apiName            createPhotoAttachments
 *
 * @api                {POST} /v1/photos/:id/attachments Endpoint title here..
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
$router->post('photos/{id}/attachments', [
    'as' => 'api_photo_create_photo_attachments',
    'uses'  => 'Controller@createPhotoAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
