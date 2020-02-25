<?php

/**
 * @apiGroup           Document
 * @apiName            getDocumentsByProjectId
 *
 * @api                {GET} /v1/projects/:id/documents Endpoint title here..
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
$router->get('projects/{id}/documents', [
    'as' => 'api_document_get_documents_by_project_id',
    'uses'  => 'Controller@getDocumentsByProjectId',
    'middleware' => [
      'auth:api',
    ],
]);
