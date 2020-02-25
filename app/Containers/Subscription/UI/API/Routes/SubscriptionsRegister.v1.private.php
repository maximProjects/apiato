<?php

/**
 * @apiGroup           Subscription
 * @apiName            SubscriptionRegister
 *
 * @api                {POST} /v1/Subscriptions/register Endpoint title here..
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
$router->post('register-subscriptions', [
    'as' => 'api_subscription_subscription_register',
    'uses'  => 'Controller@SubscriptionRegister',
    'middleware' => [
      'client',
    ],
]);
