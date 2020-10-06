<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Services\BookService;
use App\Traits\ApiResponser;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
  use ApiResponser;

  public $bookService;

  public function  __construct(BookService $bookService)
  {
    $this->bookService = $bookService;
  }

  public function index()
  {
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
