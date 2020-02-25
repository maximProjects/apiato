<?php

/** @var Route $router */
$router->get('locations/{id}/edit', [
    'as' => 'web_location_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
