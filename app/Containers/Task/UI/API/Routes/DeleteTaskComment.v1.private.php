<?php

/** @var Route $router */
$router->delete('task/{id}/comments', [
    'as' => 'api_task_delete_task_comments',
    'uses'  => 'Controller@DeleteTaskComments',
    'middleware' => [
      'auth:api',
    ],
]);
