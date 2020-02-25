<?php

/**
 * @apiGroup           Photo
 * @apiName            deletePhoto
 *
 * @api                {DELETE} /v1/photos/:id Endpoint title here..
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
$router->delete('photos/{id}', [
    'as' => 'api_photo_delete_photo',
    'uses'  => 'Controller@deletePhoto',
    'middleware' => [
      'auth:api',
    ],
]);
