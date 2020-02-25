<?php

/** @var Route $router */
$router->delete('locations/{id}', [
    'as' => 'web_location_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
