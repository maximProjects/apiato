<?php

/**
 * @apiGroup           Confirmation
 * @apiName            findConfirmationById
 *
 * @api                {GET} /v1/confirmations/:id Endpoint title here..
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
$router->get('confirmations/{id}', [
    'as' => 'api_confirmation_find_confirmation_by_id',
    'uses'  => 'Controller@findConfirmationById',
    'middleware' => [
      'auth:api',
    ],
]);
