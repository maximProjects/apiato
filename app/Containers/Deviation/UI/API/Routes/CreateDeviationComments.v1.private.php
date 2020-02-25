<?php

/**
 * @apiGroup           Deviation
 * @apiName            createDeviationAttachments
 *
 * @api                {POST} /v1/deviations/:id/comments Endpoint title here..
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
$router->post('deviations/{id}/comments', [
    'as' => 'api_deviation_create_deviation_attachments',
    'uses'  => 'Controller@createDeviationComments',
    'middleware' => [
      'auth:api',
    ],
]);
