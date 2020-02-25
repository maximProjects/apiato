<?php

/** @var Route $router */
$router->get('locations/create', [
    'as' => 'web_location_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
