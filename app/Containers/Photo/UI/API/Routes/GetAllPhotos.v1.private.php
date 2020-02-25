<?php

/**
 * @apiGroup           Photo
 * @apiName            getAllPhotos
 *
 * @api                {GET} /v1/photos Endpoint title here..
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
$router->get('photos', [
    'as' => 'api_photo_get_all_photos',
    'uses'  => 'Controller@getAllPhotos',
    'middleware' => [
      'auth:api',
    ],
]);
