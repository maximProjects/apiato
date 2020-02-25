<?php

/**
 * @apiGroup           Photo
 * @apiName            findPhotoById
 *
 * @api                {GET} /v1/photos/:id Endpoint title here..
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
$router->get('photos/{id}', [
    'as' => 'api_photo_find_photo_by_id',
    'uses'  => 'Controller@findPhotoById',
    'middleware' => [
      'auth:api',
    ],
]);
