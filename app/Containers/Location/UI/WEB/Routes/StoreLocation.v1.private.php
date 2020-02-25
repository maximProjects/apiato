<?php

/** @var Route $router */
$router->post('locations/store', [
    'as' => 'web_location_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
