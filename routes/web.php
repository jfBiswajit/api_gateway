<?php


$router->group(['middleware' => 'client.credentials'], function ($router) {
  $router->get('/authors', 'AuthorController@index');
  $router->post('/authors', 'AuthorController@store');
  $router->get('/authors/{id}', 'AuthorController@show');
  $router->put('/authors/{id}', 'AuthorController@update');
  $router->patch('/authors/{id}', 'AuthorController@update');
  $router->delete('/authors/{id}', 'AuthorController@destroy');

  $router->get('/books', 'BookController@index');
  $router->post('/books', 'BookController@store');
  $router->get('/books/{id}', 'BookController@show');
  $router->put('/books/{id}', 'BookController@update');
  $router->patch('/books/{id}', 'BookController@update');
  $router->delete('/books/{id}', 'BookController@destroy');
});
