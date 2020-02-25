<?php

/**
 * @apiGroup           Subscription
 * @apiName            createSubscription
 *
 * @api                {POST} /v1/Subscriptions Endpoint title here..
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
$router->post('subscriptions', [
    'as' => 'api_subscription_create_subscription',
    'uses'  => 'Controller@createSubscription',
    'middleware' => [
      'auth:api',
    ],
]);
