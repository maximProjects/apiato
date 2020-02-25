<?php

/** @var Route $router */
$router->patch('locations/{id}', [
    'as' => 'web_location_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
