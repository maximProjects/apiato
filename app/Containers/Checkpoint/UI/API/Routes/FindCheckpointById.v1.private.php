<?php

/**
 * @apiGroup           Checkpoint
 * @apiName            findCheckpointById
 *
 * @api                {GET} /v1/checkpoints/:id Endpoint title here..
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
$router->get('checkpoints/{id}', [
    'as' => 'api_checkpoint_find_checkpoint_by_id',
    'uses'  => 'Controller@findCheckpointById',
    'middleware' => [
      'auth:api',
    ],
]);
