<?php

/** @var Route $router */
$router->get('locations/{id}', [
    'as' => 'web_location_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
