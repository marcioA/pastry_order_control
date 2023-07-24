<?php
/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', 'OrderController@index');
$router->post('/', 'OrderController@store');
$router->get('/{id}', 'OrderController@show');
$router->put('/{id}', 'OrderController@update');
$router->delete('/{id}', 'OrderController@destroy');
