<?php

/**
 * @apiGroup           Media
 * @apiName            deleteMedia
 *
 * @api                {DELETE} /v1/media/:id Endpoint title here..
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
$router->delete('media/{id}', [
    'as' => 'api_media_delete_media',
    'uses'  => 'Controller@deleteMedia',
    'middleware' => [
      'auth:api',
    ],
]);
