<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
  use ApiResponser;
  /**
   * A list of the exception types that should not be reported.
   *
   * @var array
   */
  protected $dontReport = [
    AuthorizationException::class,
    HttpException::class,
    ModelNotFoundException::class,
    ValidationException::class,
  ];

  /**
   * Report or log an exception.
   *
   * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
   *
   * @param  \Throwable  $exception
   * @return void
   *
   * @throws \Exception
   */
  public function report(Throwable $exception)
  {
    parent::report($exception);
  }

  /**
   * Render an exception into an HTTP response.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Throwable  $exception
   * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
   *
   * @throws \Throwable
   */
  public function render($request, Throwable $exception)
  {
    if ($exception instanceof HttpException) {
      $code = $exception->getStatusCode();
      $msg = Response::$statusTexts[$code];
      return $this->errorResponse($msg, $code);
    }

    if ($exception instanceof ModelNotFoundException) {
      $model = strtolower(class_basename($exception->getModel()));
      $code = Response::HTTP_NOT_FOUND;
      $msg = "$model instance doesn't exist with given id";
      return $this->errorResponse($msg, $code);
    }

    if ($exception instanceof AuthenticationException) {
      $msg = $exception->getMessage();
      $code = Response::HTTP_FORBIDDEN;

      return $this->errorResponse($msg, $code);
    }

    if ($exception instanceof ValidationException) {
      $msg = $exception->validator->errors()->getMessages();
      $code = Response::HTTP_UNPROCESSABLE_ENTITY;

      return $this->errorResponse($msg, $code);
    }

    if ($exception instanceof ClientException) {
      $msg = $exception->getResponse()->getBody();
      $code = $exception->getCode();

      return $this->errorMessage($msg, $code);
    }

    if (env('APP_DEBUG', false)) {
      return parent::render($request, $exception);
    }

    return $this->errorResponse('Unexpected error. Please try again later.', Response::HTTP_INTERNAL_SERVER_ERROR);
  }
}
