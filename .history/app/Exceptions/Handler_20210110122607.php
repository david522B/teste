<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Request;
use \Illuminate\Auth\AuthenticationException;
use Response;
use \Illuminate\Validation\ValidationException;

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

        return parent::render($request, $e);
    }
 
    protected function unauthenticated($request, AuthenticationException $exception) { 

        if ($request->wantsJson()) {
            return response()->json([
                'error' => 'Voce precisa estar autenticado para acessar esse conteudo.'
                'token' => 'Apenas usuarios admin possuem token de api, voce pode acessalo enviando POST para /api/token com s'
            ], 401);
        }
    }
}
