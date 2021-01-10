<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Request;
use Illuminate\Auth\AuthenticationException;
use Response;

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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e) {
        // This will replace our 404 response with
        // a JSON response only for api
        if ($e instanceof ModelNotFoundException && $request->wantsJson()) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }
        if($e instanceof ValidationException && $request->wantsJson()) {
            return response()->json(['error' => 'Voce precisa estar autenticado 
            para acessar esse conteudo.'], 401);
        }
        return parent::render($request, $e);
    }

    protected function unauthenticated($request, AuthenticationException $e) {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Voce precisa estar autenticado 
            para acessar esse conteudo.'], 401);
        }
    }
}
