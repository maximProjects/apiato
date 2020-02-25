<?php

/**
 * @apiGroup           Discrepancy
 * @apiName            getDiscrepancyAttachments
 *
 * @api                {DISCREPANCIES/{ID}/ATTACHMENTS} /v1/discrepancies/:id/attachments Endpoint title here..
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
$router->get('discrepancies/{id}/attachments', [
    'as' => 'api_discrepancy_get_discrepancy_attachments',
    'uses'  => 'Controller@getDiscrepancyAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
