<?php

/**
 * @apiGroup           Document
 * @apiName            deleteDocument
 *
 * @api                {DELETE} /v1/documents/:id Endpoint title here..
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
$router->delete('documents/{id}', [
    'as' => 'api_document_delete_document',
    'uses'  => 'Controller@deleteDocument',
    'middleware' => [
      'auth:api',
    ],
]);
