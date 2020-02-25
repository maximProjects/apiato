<?php

/**
 * @apiGroup           Subscription
 * @apiName            getAllSubscriptionsRegister
 *
 * @api                {GET} /v1/Subscriptions/register Endpoint title here..
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
$router->get('register-subscriptions', [
    'as' => 'api_subscription_get_all_subscriptions_register',
    'uses'  => 'Controller@getAllSubscriptionsRegister',
    'middleware' => [
      'client',
    ],
]);
