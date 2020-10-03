<?php

$router->get('/authors', 'BookController@index');
$router->post('/authors', 'BookController@store');
$router->get('/authors/{id}', 'BookController@show');
$router->put('/authors/{id}', 'BookController@update');
$router->patch('/authors/{id}', 'BookController@update');
$router->delete('/authors/{id}', 'BookController@destroy');

$router->get('/books', 'BookController@index');
$router->post('/books', 'BookController@store');
$router->get('/books/{id}', 'BookController@show');
$router->put('/books/{id}', 'BookController@update');
$router->patch('/books/{id}', 'BookController@update');
$router->delete('/books/{id}', 'BookController@destroy');
