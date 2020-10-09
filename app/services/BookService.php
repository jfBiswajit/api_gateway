<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class BookService
{
  use ConsumeExternalService;

  public $baseUri;

  public function  __construct()
  {
    $this->baseUri = config('services.books.base_uri');
  }

  public function obtainBooks()
  {
    return $this->performRequest('GET', '/books');
  }

  public function createBook($data)
  {
    return $this->performRequest('POST', '/books', $data);
  }

  public function obtainBook($id)
  {
    return $this->performRequest('GET', "/books/{$id}");
  }

  public function editBook($data, $id)
  {
    return $this->performRequest('PUT', "/books/{$id}", $data);
  }

  public function destroyBook($id)
  {
    return $this->performRequest('DELETE', "/books/{$id}");
  }
}
