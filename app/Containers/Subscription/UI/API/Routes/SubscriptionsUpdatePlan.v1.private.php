<?php

/**
 * @apiGroup           Subscription
 * @apiName            subscriptionsUpdatePlan
 *
 * @api                {PATCH} /v1/subscriptions/plans/:id Endpoint title here..
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
$router->patch('subscriptions/plans/{id}', [
    'as' => 'api_subscription_subscriptions_update_plan',
    'uses'  => 'Controller@subscriptionsUpdatePlan',
    'middleware' => [
      'auth:api',
    ],
]);
