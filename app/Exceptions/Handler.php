<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (Throwable $exception, $request) {
            if ($request->expectsJson()) {
                $status = Response::HTTP_INTERNAL_SERVER_ERROR;

                if (method_exists($exception, 'getStatusCode')) {
                    $status = $exception->getStatusCode();
                } elseif ($exception instanceof AuthenticationException) {
                    $status = Response::HTTP_UNAUTHORIZED;
                } elseif ($exception instanceof ModelNotFoundException) {
                    $status = Response::HTTP_NOT_FOUND;
                } elseif ($exception instanceof ValidationException) {
                    $status = Response::HTTP_UNPROCESSABLE_ENTITY;
                }

                $response_json = [
                    'message' => "{$status} {$exception->getMessage()}",
                ];

                if (! app()->environment('production')) {
                    $response_json['stacktrace'] = $exception->getTraceAsString();
                }

                return response()->json(
                    $response_json,
                    $status
                );
            }
        });

        $this->reportable(function (Throwable $e) {
        });
    }
}
