<?php

/**
 * @apiGroup           Tag
 * @apiName            findTagById
 *
 * @api                {GET} /v1/tags/:id Endpoint title here..
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
$router->get('tags/{id}', [
    'as' => 'api_tag_find_tag_by_id',
    'uses'  => 'Controller@findTagById',
    'middleware' => [
      'auth:api',
    ],
]);
