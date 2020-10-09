<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class BookService
{
  use ConsumeExternalService;

  public $baseUri;

  public function  __construct()
  {
    $this->baseUri = config('services.authors.base_uri');
  }

  public function obtainBooks()
  {
    return $this->performRequest('GET', '/authors');
  }

  public function createBook($data)
  {
    return $this->performRequest('POST', '/authors', $data);
  }

  public function obtainBook($id)
  {
    return $this->performRequest('GET', "/authors/{$id}");
  }

  public function editBook($data, $id)
  {
    return $this->performRequest('PUT', "/authors/{$id}", $data);
  }

  public function destroyBook($id)
  {
    return $this->performRequest('DELETE', "/authors/{$id}");
  }
}
