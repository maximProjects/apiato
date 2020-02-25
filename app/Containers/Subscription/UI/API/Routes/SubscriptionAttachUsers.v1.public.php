<?php

/**
 * @apiGroup           Subscription
 * @apiName            SubscriptionAttachUsers
 *
 * @api                {POST} /v1/Subscriptions/:id/users Endpoint title here..
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
$router->post('subscriptions/{id}/users', [
    'as' => 'api_subscription_subscription_attach_users',
    'uses'  => 'Controller@SubscriptionAttachUsers',
    'middleware' => [
      'auth:api',
    ],
]);
