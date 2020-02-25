<?php

/**
 * @apiGroup           Photo
 * @apiName            getPhotosAttachments
 *
 * @api                {GET} /v1/photos/:id/attachments Endpoint title here..
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
$router->get('photos/{id}/attachments', [
    'as' => 'api_photo_get_photos_attachments',
    'uses'  => 'Controller@getPhotosAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
