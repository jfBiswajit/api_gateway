<?php

$router->get('/books', 'BookController@index');
$router->post('/books', 'BookController@store');
$router->get('/books/{id}', 'BookController@show');
$router->put('/books/{id}', 'BookController@update');
$router->patch('/books/{id}', 'BookController@update');
$router->delete('/books/{id}', 'BookController@destroy');
