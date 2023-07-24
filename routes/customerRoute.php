<?php
/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', 'CustomerController@index');
$router->post('/', 'CustomerController@store');
$router->get('/{id}', 'CustomerController@show');
$router->put('/{id}', 'CustomerController@update');
$router->delete('/{id}', 'CustomerController@destroy');
