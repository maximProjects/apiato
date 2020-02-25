<?php

/**
 * @apiGroup           Document
 * @apiName            getDocumentAttachments
 *
 * @api                {GET} /v1/documents/:id/attachments Endpoint title here..
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
$router->get('documents/{id}/attachments', [
    'as' => 'api_document_get_document_attachments',
    'uses'  => 'Controller@getDocumentAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
