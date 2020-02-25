<?php

/**
 * @apiGroup           Media
 * @apiName            getAllMedia
 *
 * @api                {GET} /v1/media Endpoint title here..
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
$router->get('media', [
    'as' => 'api_media_get_all_media',
    'uses'  => 'Controller@getAllMedia',
    'middleware' => [
      'auth:api',
    ],
]);
