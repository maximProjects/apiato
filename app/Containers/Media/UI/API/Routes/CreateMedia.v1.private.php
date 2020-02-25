<?php

/**
 * @apiGroup           Media
 * @apiName            createMedia
 *
 * @api                {POST} /v1/media Endpoint title here..
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
$router->post('media', [
    'as' => 'api_media_create_media',
    'uses'  => 'Controller@createMedia',
    'middleware' => [
      'auth:api',
    ],
]);
