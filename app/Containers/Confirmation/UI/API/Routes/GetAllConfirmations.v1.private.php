<?php

/**
 * @apiGroup           Confirmation
 * @apiName            getAllConfirmations
 *
 * @api                {GET} /v1/confirmations Endpoint title here..
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
$router->get('confirmations', [
    'as' => 'api_confirmation_get_all_confirmations',
    'uses'  => 'Controller@getAllConfirmations',
    'middleware' => [
      'auth:api',
    ],
]);
