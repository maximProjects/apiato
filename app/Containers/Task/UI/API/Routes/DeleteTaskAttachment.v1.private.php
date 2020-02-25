<?php

/** @var Route $router */
$router->delete('task/{id}/attachments', [
    'as' => 'api_task_delete_task_attachments',
    'uses'  => 'Controller@DeleteTaskAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
