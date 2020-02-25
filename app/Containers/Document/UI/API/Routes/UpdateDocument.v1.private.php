<?php

/**
 * @apiGroup           Document
 * @apiName            updateDocument
 *
 * @api                {PATCH} /v1/documents/:id Endpoint title here..
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
$router->patch('documents/{id}', [
    'as' => 'api_document_update_document',
    'uses'  => 'Controller@updateDocument',
    'middleware' => [
      'auth:api',
    ],
]);
