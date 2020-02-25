<?php

/**
 * @apiGroup           Subscription
 * @apiName            findSubscriptionById
 *
 * @api                {GET} /v1/Subscriptions/:id Endpoint title here..
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
$router->get('subscriptions/{id}', [
    'as' => 'api_subscription_find_subscription_by_id',
    'uses'  => 'Controller@findSubscriptionById',
    'middleware' => [
      'auth:api',
    ],
]);
