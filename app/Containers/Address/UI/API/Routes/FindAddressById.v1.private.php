<?php

/**
 * @apiGroup           Address
 * @apiName            findAddressById
 *
 * @api                {GET} /v1/addresses/:id Endpoint title here..
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
$router->get('addresses/{id}', [
    'as' => 'api_address_find_address_by_id',
    'uses'  => 'Controller@findAddressById',
    'middleware' => [
      'auth:api',
    ],
]);
