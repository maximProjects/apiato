<?php

/**
 * @apiGroup           Checkpoint
 * @apiName            createCheckpoint
 *
 * @api                {POST} /v1/checkpoints Endpoint title here..
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
$router->post('checkpoints', [
    'as' => 'api_checkpoint_create_checkpoint',
    'uses'  => 'Controller@createCheckpoint',
    'middleware' => [
      'auth:api',
    ],
]);
