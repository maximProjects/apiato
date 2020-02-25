<?php

/**
 * @apiGroup           Subscription
 * @apiName            deleteSubscription
 *
 * @api                {DELETE} /v1/Subscriptions/:id Endpoint title here..
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
$router->delete('subscriptions/{id}', [
    'as' => 'api_subscription_delete_subscription',
    'uses'  => 'Controller@deleteSubscription',
    'middleware' => [
      'auth:api',
    ],
]);
