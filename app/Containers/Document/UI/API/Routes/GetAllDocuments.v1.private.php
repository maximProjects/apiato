<?php

/**
 * @apiGroup           Document
 * @apiName            getAllDocuments
 *
 * @api                {GET} /v1/documents Endpoint title here..
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
$router->get('documents', [
    'as' => 'api_document_get_all_documents',
    'uses'  => 'Controller@getAllDocuments',
    'middleware' => [
      'auth:api',
    ],
]);
