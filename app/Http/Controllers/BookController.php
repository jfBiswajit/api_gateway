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
    return $this->successResponse($this->bookService->obtainBooks());
  }

  public function store(Request $req)
  {
    return $this->successResponse($this->bookService->createBook($req->all(), Response::HTTP_CREATED));
  }

  public function show($id)
  {
    return $this->successResponse($this->bookService->obtainBook($id));
  }

  public function update(Request $req, $id)
  {
    return $this->successResponse($this->bookService->editBook($req->all(), $id));
  }

  public function destroy($id)
  {
    return $this->successResponse($this->bookService->destroyBook($id));
  }
}
