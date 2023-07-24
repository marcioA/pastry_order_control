<?php
/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', 'ProductController@index');
$router->post('/', 'ProductController@store');
$router->get('/{id}', 'ProductController@show');
$router->put('/{id}', 'ProductController@update');
$router->delete('/{id}', 'ProductController@destroy');
