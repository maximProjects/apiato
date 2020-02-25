<?php

/**
 * @apiGroup           Subscription
 * @apiName            updateSubscription
 *
 * @api                {PATCH} /v1/Subscriptions/:id Endpoint title here..
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
$router->patch('subscriptions/{id}', [
    'as' => 'api_subscription_update_subscription',
    'uses'  => 'Controller@updateSubscription',
    'middleware' => [
      'auth:api',
    ],
]);
