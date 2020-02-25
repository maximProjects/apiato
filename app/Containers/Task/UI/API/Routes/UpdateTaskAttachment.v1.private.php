<?php

/** @var Route $router */
$router->post('tasks/{id}/attachments', [
    'as' => 'api_task_update_task_attachments',
    'uses'  => 'Controller@UpdateTaskAttachments',
    'middleware' => [
      'auth:api',
    ],
]);
