<?php

/**
 * @apiGroup           Checkpoint
 * @apiName            deleteCheckpoint
 *
 * @api                {DELETE} /v1/checkpoints/:id Endpoint title here..
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
$router->delete('checkpoints/{id}', [
    'as' => 'api_checkpoint_delete_checkpoint',
    'uses'  => 'Controller@deleteCheckpoint',
    'middleware' => [
      'auth:api',
    ],
]);
