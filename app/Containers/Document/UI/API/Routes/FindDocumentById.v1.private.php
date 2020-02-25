<?php

/**
 * @apiGroup           Document
 * @apiName            findDocumentById
 *
 * @api                {GET} /v1/documents/:id Endpoint title here..
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
$router->get('documents/{id}', [
    'as' => 'api_document_find_document_by_id',
    'uses'  => 'Controller@findDocumentById',
    'middleware' => [
      'auth:api',
    ],
]);
