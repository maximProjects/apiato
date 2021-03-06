<?php

/**
 * @apiGroup           Tag
 * @apiName            deleteTag
 *
 * @api                {DELETE} /v1/tags/:id Endpoint title here..
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
$router->delete('tags/{id}', [
    'as' => 'api_tag_delete_tag',
    'uses'  => 'Controller@deleteTag',
    'middleware' => [
      'auth:api',
    ],
]);
