<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
  public function successResponse($data, $code = Response::HTTP_OK)
  {
    return response($data, $code)->header('content-type', 'application/json');
  }

  public function errorResponse($message, $code)
  {
    return response()->json([
      'success' => false,
      'error' => $message,
      'code' => $code
    ], $code);
  }

  public function errorMessage($message, $code)
  {
    return response($message, $code)->header('content-type', 'application/json');
  }
}
