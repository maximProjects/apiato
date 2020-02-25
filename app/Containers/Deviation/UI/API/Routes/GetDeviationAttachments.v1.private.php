<?php

/**
 * @apiGroup           Deviation
 * @apiName            getDeviationAttachments
 *
 * @api                {GET} /v1/deviations/:id/attachments Endpoint title here..
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
$router->get('deviations/{id}/attachments', [
    'as' => 'api_deviation_get_deviation_attachments',
    'uses'  => 'Controller@getDeviationAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
