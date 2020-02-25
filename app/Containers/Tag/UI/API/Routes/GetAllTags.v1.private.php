<?php

/**
 * @apiGroup           Tag
 * @apiName            getAllTags
 *
 * @api                {GET} /v1/tags Endpoint title here..
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
$router->get('tags', [
    'as' => 'api_tag_get_all_tags',
    'uses'  => 'Controller@getAllTags',
    'middleware' => [
      'auth:api',
    ],
]);
