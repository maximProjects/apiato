<?php

/** @var Route $router */
$router->patch('tasks/{id}/comments', [
    'as' => 'api_task_update_task_comments',
    'uses'  => 'Controller@UpdateTaskComments',
    'middleware' => [
      'auth:api',
    ],
]);
