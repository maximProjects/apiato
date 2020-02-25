<?php

/**
 * @apiGroup           Subscription
 * @apiName            getAllSubscriptions
 *
 * @api                {GET} /v1/Subscriptions Endpoint title here..
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
$router->get('subscriptions', [
    'as' => 'api_subscription_get_all_subscriptions',
    'uses'  => 'Controller@getAllSubscriptions',
    'middleware' => [
      'auth:api',
    ],
]);
