<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    public function render($request, Throwable $e)
    {
        $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        $errors = null;
        if($e instanceof HttpResponseException) {
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        } elseif ($e instanceof MethodNotAllowedHttpException) {
            $status = Response::HTTP_METHOD_NOT_ALLOWED;
            $e      = new MethodNotAllowedHttpException([],'HTTP_METHOD_NOT_ALLOWED', $e);
        } elseif ($e instanceof NotFoundHttpException){
            $status = Response::HTTP_NOT_FOUND;
            $e      = new NotFoundHttpException('HTTP_NOT_FOUND', $e);
        } elseif ($e instanceof ModelNotFoundException){
            $status = Response::HTTP_NOT_FOUND;
            $e      = new ModelNotFoundException('HTTP_NOT_FOUND', $e);
        } elseif ($e instanceof ValidationException) {
            $status = Response::HTTP_UNPROCESSABLE_ENTITY;
            $errors = $e->errors();
        } elseif ($e) {
            $e      = new HttpException($status, 'HTTP_INTERNAL_SERVER_ERROR');
        }
        $e->getCode();
        $response = [
            'success' =>false,
            'code'    =>$status,
            'message' =>$e->getMessage(),
        ];
        if($errors) {
            $response['errors'] = $errors;
        }

        return response()->json($response,  $status);

    }
}
