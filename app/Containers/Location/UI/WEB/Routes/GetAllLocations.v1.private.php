<?php

/** @var Route $router */
$router->get('locations', [
    'as' => 'web_location_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
