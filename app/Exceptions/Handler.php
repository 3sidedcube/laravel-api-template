<?php

namespace App\Exceptions;

use App\Exceptions\Renders\AuthenticationExceptionRender;
use App\Exceptions\Renders\AuthorizationExceptionRender;
use App\Exceptions\Renders\HttpExceptionRender;
use App\Exceptions\Renders\NotFoundHttpExceptionRender;
use App\Exceptions\Renders\ValidationExceptionRender;
use App\Exceptions\Reports\ThrowableReport;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Exception\CommandNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use ThreeSidedCube\LaravelApiErrors\Exceptions\ApiErrorException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        ApiErrorException::class,
        AuthenticationException::class,
        AuthorizationException::class,
        CommandNotFoundException::class,
        HttpException::class,
        ModelNotFoundException::class,
        NotFoundHttpException::class,
        ValidationException::class,
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(new ThrowableReport($this));
        $this->renderable(new AuthenticationExceptionRender());
        $this->renderable(new AuthorizationExceptionRender());
        $this->renderable(new NotFoundHttpExceptionRender());
        $this->renderable(new ValidationExceptionRender());
        $this->renderable(new HttpExceptionRender());
    }
}
