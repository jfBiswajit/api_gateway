<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Services\AuthorService;
use App\Traits\ApiResponser;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
  use ApiResponser;

  public $authorService;

  public function  __construct(AuthorService $authorService)
  {
    $this->authorService = $authorService;
  }

  public function index()
  {
    return $this->successResponse($this->authorService->obtainAuthors());
  }

  public function store(Request $req)
  {
  }

  public function show($id)
  {
  }

  public function update(request $req, $id)
  {
  }

  public function destroy($id)
  {
  }
}
