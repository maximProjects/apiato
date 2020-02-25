<?php

/**
 * @apiGroup           Photo
 * @apiName            getPhotosByProjectId
 *
 * @api                {GET} /v1/projects/:id/photos Endpoint title here..
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
$router->get('projects/{id}/photos', [
    'as' => 'api_photo_get_photos_by_project_id',
    'uses'  => 'Controller@getPhotosByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
