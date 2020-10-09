<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class AuthorService
{
  use ConsumeExternalService;

  public $baseUri;

  public function  __construct()
  {
    $this->baseUri = config('services.authors.base_uri');
  }

  public function obtainAuthors()
  {
    return $this->performRequest('GET', '/authors');
  }

  public function createAuthor($data)
  {
    return $this->performRequest('POST', '/authors', $data);
  }

  public function obtainAuthor($id) {
    return $this->performRequest('GET', "/authors/{$id}");
  }
}
