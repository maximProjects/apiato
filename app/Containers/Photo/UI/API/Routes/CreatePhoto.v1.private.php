<?php

/**
 * @apiGroup           Photo
 * @apiName            createPhoto
 *
 * @api                {POST} /v1/photos Endpoint title here..
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
$router->post('photos', [
    'as' => 'api_photo_create_photo',
    'uses'  => 'Controller@createPhoto',
    'middleware' => [
      'auth:api',
    ],
]);
